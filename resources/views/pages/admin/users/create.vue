<template>
    <form @submit.prevent="createUser()">
        <a-card title="Create New Account" class="w-100">
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

                    <!-- Password -->
                    <div class="row mb-3 mx-auto">
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
                    <div class="row mb-3 mx-auto">
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
                        type="primary"
                        class="mx-2 my-2 mb-sm-0 order-1 order-sm-2"
                        html-type="submit"
                    >
                        <span>Create</span>
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

export default {
    setup() {
        const store = useMenu();
        store.onSelectedKeys(["admin-users"]);

        const users_status = ref([]);
        const departments = ref([]);

        const router = useRouter();

        const users = reactive({
            status_id: [],
            username: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            departments_id: [],
        });

        const errors = ref({});

        const getUserCreate = () => {
            axios
                .get("http://127.0.0.1:8000/api/user/create")
                .then((res) => {
                    users_status.value = res.data.status;
                    departments.value = res.data.departments;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createUser = () => {
            if (
                !users.status_id &&
                !users.username &&
                !users.name &&
                !users.email &&
                !users.departments_id &&
                !users.password &&
                !users.password_confirmation
            ) {
                return alert("Please fill the form!!");
            }

            axios
                .post("http://127.0.0.1:8000/api/users", users)
                .then((res) => {
                    if (res) {
                        message.success("Creating Success!");
                        router.push({ name: "admin-users" });
                    }
                })
                .catch((err) => {
                    // console.log(err);
                    errors.value = err.response.data.errors;
                });
        };

        getUserCreate();

        return {
            users_status,
            departments,
            filterOption,
            createUser,
            ...toRefs(users),
            errors,
        };
    },
};
</script>
<style scoped>
/* .select-danger {
  border: 1px solid red;
} */
</style>
