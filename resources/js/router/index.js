import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home.vue';
import PageNotFound from "../pages/PageNotFound.vue";
import AboutMe from "../pages/AboutMe.vue";

export const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'AboutMe',
        path: '/about',
        component: AboutMe
    },
    {
        path: '/:pathMatch(.*)*',
        component: PageNotFound,
        name: 'PageNotFound'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
