<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        return Users::findOrFail($id);
    }

    public function index()
    {
        $users = DB::table('users')
            ->join('departments', 'users.departments_id', '=', 'departments.id')
            ->join('status', 'users.status_id', '=', 'status.id')
            ->select(

                'users.*',
                'departments.departments_name',
                'status.status_name'
            )
            ->get();
        return response()->json($users);
    }

    public function create()
    {
        $status = DB::table('status')
            ->select(
                'id as value',
                'status_name as label'
            )->get();

        $departments = DB::table('departments')
            ->select(
                "id as value",
                "departments_name as label"
            )->get();

        return response()->json([
            "status" => $status,
            "departments" => $departments
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "status_id" => "required",
            "username" => "required|unique:users,username",
            "name" => "required",
            "email" => "required|email|unique:users,email",

            "password" => "required|confirmed",
            "password_confirmation" => "required",

            "departments_id" => "required",

        ], [
            "status_id.required" => "Invalid Status!",
            "username.required" => "Enter Username!",
            "username.unique" => "Available Username!",

            "name.required" => "Enter Name!",
            "email.required" => "Enter Email!",
            "email.email" => "Invalid Format Email!",
            "email.unique" => "Available Email!",

            "departments_id.required" => "Invalid Departmant!",
        ]);

        Users::create([
            "status_id" => $request['status_id'],
            "username" => $request['username'],
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => Hash::make($request['password']),
            "departments_id" => $request['departments_id'],
        ]);
    }
    
    public function edit($id)
    {
        $users = User::find($id);

        $status = DB::table('status')
            ->select(
                'id as value',
                'status_name as label'
            )->get();

        $departments = DB::table('departments')
            ->select(
                "id as value",
                "departments_name as label"
            )->get();

        return response()->json([
            "status" => $status,
            "departments" => $departments,
            "users" => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            "status_id" => "required",
            "username" => "required|unique:users,username, " . $id,
            "name" => "required",
            "email" => "required|email|unique:users,email," . $id,
            "departments_id" => "required",

        ], [
            "status_id.required" => "Invalid Status!",
            "username.required" => "Enter Username!",
            "username.unique" => "Available Username!",

            "name.required" => "Enter Name!",
            "email.required" => "Enter Email!",
            "email.email" => "Invalid Format Email!",
            "email.unique" => "Available Email!",

            "departments_id.required" => "Invalid Departmant!",
        ]);




        Users::find($id)->update([
            "status_id" => $request['status_id'],
            "username" => $request['username'],
            "name" => $request['name'],
            "email" => $request['email'],
            "departments_id" => $request['departments_id']
        ]);

        if ($request["change_password"] == true) {
            $validated = $request->validate([
                "password" => "required|confirmed",
                "password_confirmation" => "required",

            ], [
                "password.required" => "Invalid Password!",
            ]);

            $date = NOW();
            // $timestamp = timestamp($date);

            // $date = Carbon::fromTimestamp($timestamp);

            Users::find($id)->update([
                "change_password_at" => $date,

                "password" => Hash::make($request['password']),
                // "password" => $request['password'],

            ]);
        }
    }

    public function delete($id)
    {
        $users = Users::find($id);
        if (!$users) {
            return response()->json([
                'status' => 400,
                'msg' => 'User not found'
            ], 404);
        }

        $users->delete();

        return response()->json([
            'status' => 200,
            'msg' => 'User deleted successfully'
        ]);
    }
}
