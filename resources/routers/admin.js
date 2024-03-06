const admin = [
    // Routing Users

    {
        path: "/users",
        name: "admin-users",
        component: () => import("../views/pages/admin/users/index.vue"),
        meta: {
            layout: "admin",
        },
    },
    {
        path: "/users/create",
        name: "user-create",
        component: () => import("../views/pages/admin/users/create.vue"),
        meta: {
            layout: "admin",
        },
    },
    {
        path: "/users/:id/update",
        name: "user-update",
        component: () => import("../views/pages/admin/users/update.vue"),
        meta: {
            layout: "admin",
        },
    },

    // Routing Roles
    {
        path: "/roles",
        name: "admin-roles",
        component: () => import("../views/pages/admin/roles/index.vue"),
        meta: {
            layout: "admin",
        },
    },

    // Routing Settings
    {
        path: "/settings",
        name: "admin-settings",
        component: () => import("../views/pages/admin/settings/index.vue"),
        meta: {
            layout: "admin",
        },
    },
    // Authentication
    {
        path: "/",
        name: "Auth",
        component: () => import("../views/auth/Auth.vue"),
        meta: {
            layout: "auth",
        },
    },
];

export default admin;
