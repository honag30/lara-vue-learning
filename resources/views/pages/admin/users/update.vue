<template>
    <form @submit.prevent="updateUsers()">
        <a-card title="Update Account" class="w-100">
            <div class="row pe-sm-5 mb-2">
                <!-- Avatar -->
                <div class="col-12 col-sm-4">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-4">
                            <a-avatar shape="square" :size="200">
                                <template #icon>
                                    <img
                                        src="../../../../assets/avatar-2.jpg"
                                        alt="Avatar"
                                    />
                                </template>
                            </a-avatar>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-5">
                        <a-button type="primary">
                            <i class="fa-solid fa-plus me-2"></i>
                            <span>Add image</span>
                        </a-button>
                    </div>
                </div>
                <!-- End Avatar -->

                <!-- Form -->
                <div class="col-12 col-sm-8">
                    <!-- Status -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span :class="{ 'text-danger': errors.status_id }"
                                >Status:</span
                            >
                        </div>

                        <div class="col-12 col-sm-9">
                            <a-select
                                show-search
                                placeholder="Select Status..."
                                class="w-100 full-width"
                                :options="users_status"
                                :filter-option="filterOption"
                                v-model:value="status_id"
                            ></a-select>
                            <div class="w-100">
                                <small
                                    v-if="errors.status_id"
                                    class="text-danger"
                                >
                                    {{ errors.status_id[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Status -->

                    <!-- Username -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span :class="{ 'text-danger': errors.username }"
                                >Username:</span
                            >
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input
                                class="w-100"
                                placeholder="Enter Username..."
                                allow-clear
                                v-model:value="username"
                            />
                            <div class="w-100">
                                <small
                                    v-if="errors.username"
                                    class="text-danger"
                                >
                                    {{ errors.username[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Username -->

                    <!-- Fullname -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span :class="{ 'text-danger': errors.name }"
                                >Fullname:</span
                            >
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input
                                class="w-100"
                                placeholder="Enter Fullname..."
                                allow-clear
                                v-model:value="name"
                            />
                            <div class="w-100">
                                <small v-if="errors.name" class="text-danger">
                                    {{ errors.name[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Fullname -->

                    <!-- Email -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span :class="{ 'text-danger': errors.email }"
                                >Email:</span
                            >
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input
                                class="w-100"
                                placeholder="Enter Email..."
                                allow-clear
                                v-model:value="email"
                            />
                            <div class="w-100">
                                <small v-if="errors.email" class="text-danger">
                                    {{ errors.email[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Email -->

                    <!-- Department -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span
                                :class="{
                                    'text-danger': errors.departments_id,
                                }"
                                >Department:</span
                            >
                        </div>

                        <div class="col-12 col-sm-9">
                            <a-select
                                show-search
                                placeholder="Select Department..."
                                class="w-100"
                                :options="departments"
                                :filter-option="filterOption"
                                v-model:value="departments_id"
                            ></a-select>
                            <div class="w-100">
                                <small
                                    v-if="errors.departments_id"
                                    class="text-danger"
                                >
                                    {{ errors.departments_id[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Department -->

                    <!-- Password Checkbox -->
                    <div class="row mb-3 mx-auto">
                        <div
                            class="col-12 col-sm-3 d-flex align-items-center"
                        ></div>
                        <div class="col-12 col-sm-9">
                            <a-checkbox v-model:checked="change_password">
                                Change Password
                            </a-checkbox>
                        </div>
                    </div>
                    <!-- End Password Checkbox -->

                    <!-- Password -->
                    <div
                        class="row mb-3 mx-auto"
                        v-if="change_password == true"
                    >
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span :class="{ 'text-danger': errors.password }"
                                >Password:</span
                            >
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input-password
                                class="w-100"
                                placeholder="Enter Password..."
                                allow-clear
                                v-model:value="password"
                            />
                            <div class="w-100">
                                <small
                                    v-if="errors.password"
                                    class="text-danger"
                                >
                                    {{ errors.password[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Password -->

                    <!-- Confirm Password -->
                    <div
                        class="row mb-3 mx-auto"
                        v-if="change_password == true"
                    >
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span class="text-danger me-1">*</span>
                            <span
                                :class="{
                                    'text-danger': errors.password_confirmation,
                                }"
                                >Confirm Password:</span
                            >
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input-password
                                class="w-100"
                                placeholder="Repeat Password..."
                                allow-clear
                                v-model:value="password_confirmation"
                            />
                            <div class="w-100">
                                <small
                                    v-if="errors.password_confirmation"
                                    class="text-danger"
                                >
                                    {{ errors.password_confirmation[0] }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- End Confirm Password -->

                    <!-- Login At -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span>Lastest Login: </span>
                        </div>
                        <div class="col-12 col-sm-9">
                            <span>{{ login_at }}</span>
                        </div>
                    </div>
                    <!-- End Login At -->

                    <!-- Change Password At -->
                    <div class="row mb-3 mx-auto">
                        <div class="col-12 col-sm-3 d-flex align-items-center">
                            <span>Lastest Change Password: </span>
                        </div>
                        <div class="col-12 col-sm-9">
                            <span>{{ change_password_at }}</span>
                        </div>
                    </div>
                    <!-- End Change Password At -->
                </div>
                <!-- End Form -->
            </div>

            <!-- Button -->
            <div class="row pe-sm-5">
                <div
                    class="col-12 mx-auto d-grid d-sm-flex justify-content-sm-end"
                >
                    <router-link :to="{ name: 'admin-users', params: '' }">
                        <a-button class="mx-2 my-2 mb-sm-0 order-2 order-sm-1">
                            <span>Back</span>
                        </a-button>
                    </router-link>

                    <a-button
                        type="default"
                        class="mx-2 my-2 mb-sm-0 order-1 order-sm-2 bg-success text-white"
                        html-type="submit"
                    >
                        <span>Update</span>
                    </a-button>
                </div>
            </div>
            <!-- End Button -->
        </a-card>
    </form>
</template>
<script>
import axios from "axios";
import { useMenu } from "../../../../stores/use-menu";
import { reactive, ref, toRefs } from "vue";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";

export default {
    setup() {
        const store = useMenu();
        store.onSelectedKeys(["admin-users"]);

        const users_status = ref([]);
        const departments = ref([]);

        const router = useRouter();
        const route = useRoute();

        const users = reactive({
            status_id: [],
            username: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            departments_id: [],
            change_password: false,
            login_at: "",
            change_password_at: "",
        });

        const errors = ref({});

        const getUserEdit = () => {
            axios
                .get(`http://127.0.0.1:8000/api/users/${route.params.id}/edit`)
                .then((res) => {
                    users.status_id = res.data.users.status_id;
                    users.username = res.data.users.username;
                    users.name = res.data.users.name;
                    users.email = res.data.users.email;
                    users.departments_id = res.data.users.departments_id;

                    users_status.value = res.data.status;
                    departments.value = res.data.departments;

                    res.data.users.login_at
                        ? (users.login_at = res.data.users.login_at)
                        : (users.login_at = "Not yet Login.");

                    res.data.users.change_password_at
                        ? (users.change_password_at =
                              res.data.users.change_password_at)
                        : (users.change_password_at =
                              "Not yet change password.");
                })
                .catch((err) => {
                    console.log(err);
                });
        };
        getUserEdit();

        const updateUsers = () => {
            axios
                .put(
                    `http://127.0.0.1:8000/api/users/${route.params.id}`,
                    users,
                )
                .then((res) => {
                    console.log("update", res);
                    if (res) {
                        message.success("Update Success!");
                        router.push({ name: "admin-users" });
                    }
                })
                .catch((err) => {
                    console.log(err);
                    errors.value = err.response.data.errors;
                });
        };

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        return {
            users_status,
            departments,
            filterOption,
            ...toRefs(users),
            errors,
            updateUsers,
        };
    },
};
</script>
<style scoped>
/* .select-danger {
  border: 1px solid red;
} */
</style>
