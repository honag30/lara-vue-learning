<template>
    <h1>Setting Page</h1>
</template>
<script>
import { useMenu } from "../../../../stores/use-menu";
export default {
    setup() {
        const store = useMenu();
        store.onSelectedKeys(["admin-settings"]);
    },
};
</script>
