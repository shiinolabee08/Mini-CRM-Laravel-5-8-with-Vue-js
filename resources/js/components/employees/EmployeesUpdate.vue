<div class="form-group">
    <router-link to="/" class="btn btn-default">Back</router-link>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Edit Employee Record</div>
    <div class="panel-body">
        <form v-on:submit="saveForm()">
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" v-model="employee.first_name" class="form-control">
                </div>

                <div class="col-xs-6 form-group">
                    <label class="control-label">Name</label>
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
                    <label class="control-label">Phone</label>
                    <input type="file" v-model="employee.phone" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">Company</label>
                    <select class="form-control select2" v-model="employee.company_id">
                        <option v-for="company in companies" :value="company.id">@{{company.name }}</option>
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
<script type="text/javascript">
    export default {
        mounted() {

            let app = this;
            let id = app.$route.params.id;
            app.employeeId = id;

            axios.get('/api/v1/employees/' + id)
                .then(function (resp) {
                    app.employee = resp.data;
                })
                .catch(function () {
                    alert("Could not load your employee")
                });

            axios.get('/api/companies')
                .then(function (resp) {
                    app.companies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
        data: function () {

            return {
                employeeId: null,
                employee: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    company_id: 0,
                },
                companies: []
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.employee;
                axios.patch('/api/v1/employees/' + app.employeeId, newCompany)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your employee");
                    });
            }
        }
    }
</script>