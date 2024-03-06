<template>
    <div class="container-fuild">
        <div class="row bg-info bg-gradient p-2 text-white">
            <div
                class="col-1 d-flex d-sm-none align-items-center justify-content-center"
            >
                <span @click="showDrawer()" class="ms-4">
                    <font-awesome-icon icon="fa-solid fa-bars" />
                </span>
            </div>

            <div
                class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start"
            >
                <img
                    src="../../assets/logo-2.jpg"
                    alt="logo PC"
                    class="ms-3 me-3 rounded-circle"
                    style="height: 34px; width: 34px"
                />
                <span class="d-none d-sm-flex">Logo</span>
            </div>

            <div
                class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end"
            >
                <router-link :to="{ name: 'Auth' }">
                    <font-awesome-icon icon="fa-solid fa-user" />
                    <span class="ms-2 me-3">Admin</span>
                </router-link>
            </div>

            <div
                class="col-1 d-flex d-sm-none align-items-center justify-content-center"
            >
                <span @click="showDrawerUser()" class="me-4">
                    <font-awesome-icon icon="fa-solid fa-user" />
                </span>
            </div>
        </div>
    </div>

    <a-drawer v-model:open="open" title="Danh Mục" placement="left">
        <menu-component />
    </a-drawer>

    <a-drawer v-model:open="open_user" title="Admin" placement="right">
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>
<script>
import { ref } from "vue";
import Menu from "./Menu.vue";

/* import the fontawesome core */

export default {
    components: {
        "menu-component": Menu,
    },
    setup() {
        const open = ref(false);
        const open_user = ref(false);

        const showDrawer = () => {
            open.value = true;
            if (open.value) {
                open_user.value = false;
            }
        };
        const showDrawerUser = () => {
            open_user.value = true;
            if (open_user.value) {
                open.value = false;
            }
        };
        return { open, open_user, showDrawer, showDrawerUser };
    },
    methods: {
        closeMenu() {
            this.open = false;
        },
    },
};
</script>
