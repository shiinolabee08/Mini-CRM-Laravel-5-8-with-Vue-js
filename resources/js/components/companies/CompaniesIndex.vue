<div class="container">
    <div class="row">
        
    	<div class="form-group">
            <router-link :to="{name: 'dashboard'}" class="btn btn-success">Back to Dashbord</router-link>
    		<router-link :to="{name: 'createCompany'}" class="btn btn-success">New Company</router-link>
    	</div>
    	<div class="panel panel-default">
    		<div class="panel-heading">List of Companies</div>
    		<div class="panel-body">
    			<table class="table table-bordered table-striped">
    			<thead>
    				<tr>
    				  <th>Name</th>
    				  <th>Address</th>
    				  <th>Website</th>
    				  <th>Email</th>
    				  <th width="100"> </th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr v-for="company, index in companies">
                        <td>{{ company.logo }}</td>
                        <td>{{ company.name }}</td>
                        <td>{{ company.email }}</td>
                        <td>{{ company.website_url }}</td>
                        <td>
                            <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteRecord(company.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
    			</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>

<script type="text/javascript">
    export default {
        data: function () {
            return {
                companies: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/companies')
                .then(function (resp) {
                    app.companies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
        methods: {
            deleteRecord(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/companies/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>