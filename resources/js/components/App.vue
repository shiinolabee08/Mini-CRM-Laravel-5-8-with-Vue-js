<template>
    <div>
        <div class="position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                      <h1>Mini CRM for Companies/Employees <small>using Laravel(5.5) and Vue.js</small></h1>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="container">
                <div class="row">
                    <router-link :to="{name: 'loginPage'}" class="btn btn-primary">Login Now</router-link>
                    <router-link :to="{name: 'dashboard'}" class="btn btn-primary">Dashboard</router-link>
                    <div style="height:30px;display:block;"></div>
                    <router-view></router-view>        
                </div>
            </div>
        </div>
        <footer><h4 style="text-align:center;">Mini CRM with Laravel and Vuejs</h4></footer>
    </div>
</template>