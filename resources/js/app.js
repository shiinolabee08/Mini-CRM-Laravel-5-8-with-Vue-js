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

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: CompaniesIndex
        }
    },
    {path: '/admin/companies/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/admin/companies/edit/:id', component: CompaniesUpdate, name: 'updateCompany'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')