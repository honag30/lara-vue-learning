<template>
    <div>
        <a-menu
            v-model:openKeys="openKeys"
            v-model:selectedKeys="selectedKeys"
            mode="inline"
            class="menu"
        >
            <a-menu-item key="admin-users">
                <router-link :to="{ name: 'admin-users' }">
                    <UserOutlined />
                    <span>Account</span>
                </router-link>
            </a-menu-item>

            <a-menu-item key="admin-roles">
                <router-link :to="{ name: 'admin-roles' }">
                    <TagOutlined />
                    <span>Role</span>
                </router-link>
            </a-menu-item>

            <a-menu-item key="admin-settings">
                <router-link :to="{ name: 'admin-settings' }">
                    <SettingOutlined />
                    <span>Setting</span>
                </router-link>
            </a-menu-item>
        </a-menu>
    </div>
</template>

<script>
import { useMenu } from "../../stores/use-menu";
import { storeToRefs } from "pinia";

import {
    UserOutlined,
    SettingOutlined,
    TagOutlined,
} from "@ant-design/icons-vue";

export default {
    components: {
        UserOutlined,
        SettingOutlined,
        TagOutlined,
    },
    setup() {
        const store = useMenu();

        return { ...storeToRefs(store) };
    },
};
</script>

<!-- <script setup>
import { reactive } from "vue";

const state = reactive({
    selectedKeys: ["admin-users"],
    openKeys: [],
});
</script> -->
<style scoped>
.menu {
    height: fit-content;
}
</style>
