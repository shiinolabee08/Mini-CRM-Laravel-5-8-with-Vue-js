/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Vue Router
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

//Company Module
import CompaniesIndex from './components/companies/CompaniesIndex.vue';
import CompaniesCreate from './components/companies/CompaniesCreate.vue';
import CompaniesUpdate from './components/companies/CompaniesUpdate.vue';

//Employee Module
import EmployeesIndex from './components/employees/EmployeesIndex.vue';
import EmployeesCreate from './components/employees/EmployeesCreate.vue';
import EmployeesUpdate from './components/employees/EmployeesUpdate.vue';

import Login from './components/auth/Login.vue';

import App from './components/App.vue';

import Content from './components/Content.vue';

import Sidebar from './components/Sidebar.vue';

const routes = [
    {
        path : '/',
        component : App,
    },
    {
        path: '/admin',
        components: { default : Content, sidebar : Sidebar },
        children :[
            {
                path: 'login',
                component: Login,
                name : 'loginPage'
            },
            //Companies
            {
                path: 'companies', 
                components: { default: CompaniesIndex, sidebar : false}, 
                name : 'indexCompany',
            },
            {
                path: 'companies/create', 
                components: { default: CompaniesIndex, sidebar: CompaniesCreate }, 
                name: 'createCompany'
            },
            {
                path: 'companies/edit/:id', 
                components: { default: CompaniesIndex, sidebar: CompaniesUpdate },
                name: 'updateCompany'
            },
            //Employees
            {
                path: 'employees', 
                components: { default: EmployeesIndex, sidebar: false }, 
                name : 'indexEmployee'
            },
            {
                path: 'employees/create', 
                components: { default: EmployeesIndex, sidebar: EmployeesCreate }, 
                name: 'createEmployee'
            },
            {
                path: 'employees/edit/:id', 
                components: { default: EmployeesIndex, sidebar: EmployeesUpdate }, 
                name: 'updateEmployee'
            }
        ]
    },
];

const router = new VueRouter({ mode: 'history', routes })

const app = new Vue({ router, render: h => h(App)}).$mount('#app');