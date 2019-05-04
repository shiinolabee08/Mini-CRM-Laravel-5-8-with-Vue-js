<div class="container">
	<div class="page-header">
	  <h1>Welcome,<small>Dashboard</small></h1>
	</div>

    <ul class="nav nav-tabs">
	  <li role="presentation"><router-link :to="{name: 'indexCompany'}">Companies</router-link></li>
	  <li role="presentation"><router-link :to="{name: 'indexEmployee'}">Employees</router-link></li>
	</ul>
</div>
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
