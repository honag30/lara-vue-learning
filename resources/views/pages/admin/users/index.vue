<template>
    <a-card title="Account" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <router-link :to="{ name: 'user-create' }">
                    <a-button type="primary">
                        <i class="fa-solid fa-plus"></i>
                    </a-button>
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns">
                    <template #bodyCell="{ column, index, record }">
                        <!-- STT -->
                        <template
                            v-if="column.key === 'index'"
                            style="text-align: center"
                        >
                            <span>
                                {{ index + 1 }}
                            </span>
                        </template>
                        <!-- End STT -->

                        <!-- Status -->
                        <template v-if="column.key === 'status_name'">
                            <span
                                v-if="record.status_id == 1"
                                class="text-primary"
                            >
                                {{ record.status_name }}
                            </span>
                            <span
                                v-else-if="record.status_id == 2"
                                class="text-danger"
                            >
                                {{ record.status_name }}
                            </span>
                        </template>
                        <!-- End Status -->

                        <!-- Action -->
                        <template v-if="column.key === 'action'">
                            <!-- Update -->
                            <router-link
                                :to="{
                                    name: 'user-update',
                                    params: { id: record.id },
                                }"
                            >
                                <a-button class="bg-success text-white me-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a-button>
                            </router-link>
                            <!-- End Update -->

                            <!-- Delete -->
                            <!-- <router-link
                                @click="refreshPage"
                            > -->
                            <a-button
                                class="bg-danger text-white"
                                @click="deleteUser(record.id)"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </a-button>

                            <!-- End Delete -->
                        </template>
                        <!-- End Action -->
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>
<script>
import { ref } from "vue";
import { useMenu } from "../../../../stores/use-menu";
import { useRouter } from "vue-router";
import { message } from "ant-design-vue";

import axios from "axios";

export default {
    setup() {
        const store = useMenu();
        store.onSelectedKeys(["admin-users"]);

        const router = useRouter();

        const users = ref([]);
        const columns = [
            {
                title: "#",
                dataIndex: "index",
                key: "index",
            },
            // {
            //     title: "Avatar",
            //     dataIndex: "avatar",
            //     key: "avatar",
            // },
            {
                title: "Username",
                dataIndex: "username",
                key: "username",
            },
            {
                title: "Name",
                dataIndex: "name",
                key: "name",
            },
            {
                title: "Email",
                dataIndex: "email",
                key: "email",
            },
            {
                title: "Department",
                dataIndex: "departments_name",
                key: "departments_name",
            },
            {
                title: "Status",
                dataIndex: "status_name",
                key: "status_name",
            },
            // {
            //     title: "Role",
            //     dataIndex: "role",
            //     key: "role",
            // },
            {
                title: "Action",
                dataIndex: "action",
                key: "action",
            },
        ];

        const getUsers = () => {
            axios
                .get("http://127.0.0.1:8000/api/users")
                .then((response) => {
                    users.value = response.data;
                    // console.log("inside getUsers", users.value);
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        getUsers();

        const deleteUser = (id) => {
            axios
                .delete(`http://127.0.0.1:8000/api/users/${id}`)
                .then((res) => {
                    console.log(res);
                    message.success("Delete Success!");
                })
                .catch((err) => {
                    console.log(err);
                });
            getUsers();
        };

        return { users, columns, deleteUser };
    },
    methods: {
        refreshPage() {
            window.location.reload();
        },
    },
};
</script>
