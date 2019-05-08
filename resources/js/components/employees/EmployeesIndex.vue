<template>
    <div role="tabpanel" class="tab-pane active">
    	<div class="form-group">
    		<router-link :to="{name: 'createEmployee'}" class="btn btn-success">Create New Employee</router-link>
    	</div>
    	<div class="panel panel-default" v-if="employees.length">
    		<div class="panel-heading">Employee list</div>
    		<div class="panel-body">
    			<table class="table table-bordered table-striped">
    			<thead>
    				<tr>
    				  <th>Full Name</th>
    				  <th>Email</th>
    				  <th>Phone #</th>
    				  <th>Company ID</th>
    				  <th width="100"> </th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr v-for="employee, index in employees">
                        <td>{{ employee.first_name }} {{ employee.last_name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.company_id }}</td>
                        <td>
                            <router-link :to="{name: 'updateEmployee', params: {id: employee.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteRecord(employee.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
    			</tbody>
    			</table>
    		</div>
    	</div>
        <div class="well well-info" v-if="employees.length == 0">No records yet.</div>
        <div class="clearfix"></div>
    </div>
</template>

<script type="text/javascript">
    export default {
        data: function () {
            return {
                employees: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/employees')
                .then(function (resp) {
                    app.employees = resp.data.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load employees");
                });
        },
        methods: {
            deleteRecord(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/employees/' + id)
                        .then(function (resp) {
                            app.employees.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete employee");
                        });
                }
            }
        }
    }
</script>