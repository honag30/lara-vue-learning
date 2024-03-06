<template>
    <header-component></header-component>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-3 d-none d-sm-flex">
                <a-list bordered style="width: 100%; background-color: white">
                    <template #header>
                        <div
                            style="
                                font-weight: 600;
                                font-size: 1rem;
                                cursor: default;
                            "
                        >
                            Controller
                        </div>
                    </template>
                    <menu-component />
                </a-list>
            </div>

            <div class="col-12 col-sm-9">
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
import Header from "../components/Header.vue";
import Menu from "../components/Menu.vue";

export default {
    components: {
        "header-component": Header,
        "menu-component": Menu,
    },
};
</script>
