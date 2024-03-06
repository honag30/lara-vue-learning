<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'status_id',
        'username',
        'name',
        'email',
        'password',
        'departments_id',

    ];

    // protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = ['email_verified_at' => 'datetime'];
}
