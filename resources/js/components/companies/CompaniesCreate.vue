<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'indexCompany'}" class="btn btn-primary">Back to Company List</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">New Company Record</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="company.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="email" v-model="company.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Logo</label>
                            <input type="file" v-on:change="handleLogo" ref="logo" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Website Url</label>
                            <input type="text" v-model="company.website_url" class="form-control">
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
<script>
    export default {
        data: function () {
            return {
                company: {
                    name: '',
                    email: '',
                    logo: '',
                    website_url: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.post('/api/companies', newCompany)
                    .then(function (resp) {
                        app.$router.push({path: '/admin/companies'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company.");
                    });
            },
            handleLogo() {
                let logoFile = this.$refs.logo.files;

                this.company.logo = logoFile;

                console.log(this.company.logo, this.company.logo);
            }
        }
    }
</script>