
import AddJobView from '@/views/AddJobView.vue';
import DashboardView from '@/views/DashboardView.vue';
import JobsAddedView from '@/views/JobsAddedView.vue';
import SignInView from '@/views/SignInView.vue';
import SignUpView from '@/views/SignUpView.vue';
import { createRouter, createWebHistory } from 'vue-router';



const routes = [

    {
        path: '/signin',
        component: SignInView,
    },

    {
        path: '/signup',
        component: SignUpView,
    },
    {
        path: '/dashboard',
        component: DashboardView
    },

    {
        path: '/jobs/add',
        component: AddJobView
    },

    {
        path: '/jobs/added',
        component: JobsAddedView
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
