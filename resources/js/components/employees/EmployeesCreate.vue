<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'indexEmployee'}" class="btn btn-primary">Back to Employee List</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">New Employee Record</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" v-model="employee.first_name" class="form-control">
                        </div>
                        <div class="col-xs-6 form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" v-model="employee.last_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="email" v-model="employee.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Phone #</label>
                            <input type="text" v-model="employee.phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company</label>
                            <select class="form-control" v-model="employee.company_id">
                                <option value="" selected>Select Company</option>
                                <option v-for="company in companies" :value="company.id">{{company.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Proceed &amp; Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    export default {
        data: function () {
            return {
                employee: {
                    first_name: '',
                    last_name: '',
                    phone: '',
                    email: '',
                    company_id: 0,
                },
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
                    alert("Could not load companies");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newEmployee = app.employee;
                axios.post('/api/employees', newEmployee)
                    .then(function (resp) {
                        app.$router.push({path: '/admin/employees'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your employee.");
                    });
            }
        }
    }
</script>