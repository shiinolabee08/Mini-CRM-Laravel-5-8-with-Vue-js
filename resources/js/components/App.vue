<template>
	<div>
		<div class="position-ref">
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
	            </div>
	        </div>
	        <section class="section">
	        	<div class="container">	
			        <div class="page-header">
					  <h2>Welcome to Dashboard</h2>
					</div>
		            <nav class="navbar" role="navigation" aria-label="main navigation">
		                <div class="navbar-menu">
		                    <div class="navbar-item">
		                    	<ul class="nav nav-tabs">
								  <li role="presentation" v-bind:class="{ active : selectedTab == 0  }" v-on:click="selectedTab=0"><router-link :to="{name: 'indexCompany'}" class="navbar-item">Companies</router-link></li>
								  <li role="presentation" v-bind:class="{ active : selectedTab == 1  }" v-on:click="selectedTab=1"><router-link :to="{name: 'indexEmployee'}" class="navbar-item">Employees</router-link></li>
								</ul>
		                        <!-- <a class="button is-light" v-on:click='logout' id='logout-button'> Logout </a> -->
		                        <!-- <a class="button is-light" v-else v-on:click='login' id='login-button'> Login </a> -->
		                    </div>
		                </div>
		            </nav>
	        		<div class="col-md-8">
				        <div class="tab-content">
							<app-content></app-content>
						</div>
					</div>
					<div class="col-md-4">	    	
			    		<app-sidebar></app-sidebar>
					</div>
					<div class="clearfix"></div>
     			</div>
	    	</section>
	    </div>
	    <footer><h4 style="text-align:center;">Mini CRM with Laravel and Vuejs</h4></footer>
	</div>
</template>
<script>
	import Content from './Content.vue';
	import Sidebar from './Sidebar.vue';

	export default{
		components : {
			'app-content' : Content,
			'app-sidebar' : Sidebar
		},
		data : function(){
			return {
                selectedTab : 0,
                currentRoute : 'indexCompany',
            }
		},
		mounted() {
        	var app = this;

        	var currentRoute = app.$router.currentRoute;

        	app.currentRoute = currentRoute.name;

        	app.selectedTab = currentRoute.name == 'indexCompany' ? 0 : 1;
        }    
	}
</script>