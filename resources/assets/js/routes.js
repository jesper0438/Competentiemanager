import VueRouter from 'vue-router';
import Vakexpert from './components/Vakexpert.vue';
import Project from './components/Project.vue';
import Student from './components/Student.vue';
import Hzapi from  './components/Hzapi.vue';



let routes = [
    {
        path: '/',
        component: Vakexpert
    },
    {
        path: '/project',
        component: Project
    },
    {
    	path: '/student',
    	component: Student
    },
    {
        path: '/hzapi',
        component: Hzapi
    }
];


export default new VueRouter({
    routes
});