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
import CompaniesIndex from './components/companies/CompaniesIndex';
import CompaniesCreate from './components/companies/CompaniesCreate';
import CompaniesUpdate from './components/companies/CompaniesUpdate';

//Employee Module
import EmployeesIndex from './components/employees/EmployeesIndex';
import EmployeesCreate from './components/employees/EmployeesCreate';
import EmployeesUpdate from './components/employees/EmployeesUpdate';

import Login from './components/auth/Login';

import Dashboard from './components/Dashboard';

const routes = [
	{
        path: '/',
        redirect: {
            name: "loginPage"
        }
    },
    {
        path: '/login',
        component: Login,
        name : 'loginPage'
    },
    {
        path: '/admin/dashboard',
        component : Dashboard,
        name : 'dashboard'
    },
    
    //Companies
    {
    	path: '/admin/companies', 
    	component: CompaniesIndex, 
    	name : 'indexCompany'
    },
    {
    	path: '/admin/companies/create', 
    	component: CompaniesCreate, 
    	name: 'createCompany'
    },
    {
    	path: '/admin/companies/edit/:id', 
    	component: CompaniesUpdate, 
    	name: 'updateCompany'
    },


   	//Employees
    {
    	path: '/admin/employees', 
    	component: EmployeesIndex, 
    	name : 'indexEmployee'
    },
    {
    	path: '/admin/employees/create', 
    	component: EmployeesCreate, 
    	name: 'createEmployee'
    },
    {
    	path: '/admin/employees/edit/:id', 
    	component: EmployeesUpdate, 
    	name: 'updateEmployee'
    },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')