<template>
    <div>        
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form v-on:submit="loginForm()">
                        <div class="row">
                            <div class="col-xs-6 form-group">
                                <label class="control-label">Email</label>
                                <input type="text" v-model="user.email" class="form-control">
                            </div>
                            <div class="col-xs-6 form-group">
                                <label class="control-label">Password</label>
                                <input type="password" v-model="user.password" class="form-control">
                            </div>
                        </div>                    
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
          </div>
    </div>
    </div>
</template>

<script>
  export default {
    data: function () {
        return {
            user : {
                email: '',
                password: ''
            }   
        }
    },
    methods: {
        loginForm() {
            event.preventDefault();
            var app = this;

            axios.post('api/login/authenticate', app.user)
                .then(function (response) {
                    if ( response.status ) {
                        app.$router.push({path: '/dashboard' });
                    }
                })
                .catch(function (resp) {
                    console.log(resp);
                });
        }
    }    
  }
</script>