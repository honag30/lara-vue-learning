<template>
    <h1>Role Page</h1>
</template>
<script>
import { useMenu } from "../../../../stores/use-menu";
export default {
    setup() {
        const store = useMenu();
        store.onSelectedKeys(["admin-roles"]);
    },
};
</script>
