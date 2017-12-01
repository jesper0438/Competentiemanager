import VueRouter from 'vue-router';
import Vakexpert from './components/Vakexpert.vue';
import Project from './components/Project.vue';
import Student from './components/Student.vue';


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
    }
];


export default new VueRouter({
    routes
});