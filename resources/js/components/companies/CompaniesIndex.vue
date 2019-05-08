<template>
    <div role="tabpanel" class="tab-pane active">               
    	<div class="form-group">
    		<router-link :to="{name: 'createCompany'}" class="btn btn-success">New Company</router-link>
    	</div>
    	<div class="panel panel-default" v-if="companies.length">
    		<div class="panel-heading">List of Companies</div>
    		<div class="panel-body">
    			<table class="table table-bordered table-striped">
    			<thead>
    				<tr>
    				  <th>Logo</th>
    				  <th>Name</th>
    				  <th>Email</th>
    				  <th>Website Url</th>
    				  <th width="100">Actions</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr v-for="company in companies">
                        <td>{{ company.logo }}</td>
                        <td>{{ company.name }}</td>
                        <td>{{ company.email }}</td>
                        <td><a v-bind:href="company.website_url" target="_blank">{{ company.website_url }}</a></td>
                        <td>
                            <router-link :to="{name: 'updateCompany', params: {id: company.id}}" class="btn btn-xs btn-default">
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
        <div class="well well-info" v-if="companies.length == 0">No records yet.</div>           
        <div class="clearfix"></div>
    </div>
</template>

<script>
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
                    app.companies = resp.data.data;
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