import { defineAsyncComponent } from "vue";

export function registerGlobalComponent(app) {
    app.component(
        "auth-layout",
        defineAsyncComponent(() => import("../layouts/AuthLayout.vue")),
    );
    app.component(
        "admin-layout",
        defineAsyncComponent(() => import("../layouts/Admin.vue")),
    );
}
