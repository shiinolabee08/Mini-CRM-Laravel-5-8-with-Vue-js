<template>
	<div>
	    <section class="section">
	        <div class="container">
	        	<div class="page-header">
				  <h1>Welcome to Dashboard</h1>
				</div>
	            <nav class="navbar" role="navigation" aria-label="main navigation">
	                <div class="navbar-menu">
	                    <div class="navbar-item">
	                    	<ul class="nav nav-pills">
							  <li role="presentation" class="active"><router-link :to="{name: 'indexCompany'}" class="navbar-item">Companies</router-link></li>
							  <li role="presentation"><router-link :to="{name: 'indexEmployee'}" class="navbar-item">Employees</router-link></li>
							</ul>
	                        <!-- <a class="button is-light" v-on:click='logout' id='logout-button'> Logout </a> -->
	                        <!-- <a class="button is-light" v-else v-on:click='login' id='login-button'> Login </a> -->
	                    </div>
	                </div>
	            </nav>

	            <router-view></router-view>
	        </div>
	    </section>
	</div>
</template>
<script type="text/javascript">
	export default {
		data : function(){
			return {
				user : {
					id : '',
					email : '',
					name : ''
				}
			}
		},

		mounted(){
			//test
		}
	}
</script>
