import VueRouter from 'vue-router';
import Vakexpert from './components/Vakexpert.vue';
import Project from './components/Project.vue';


let routes = [
    {
        path: '/',
        component: Vakexpert
    },
    {
        path: '/project',
        component: Project
    }
];


export default new VueRouter({
    routes
});