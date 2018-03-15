<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">

                            <div class="form-group" :class="{'has-error' : errorsEmail}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="loginDetails.email" required autofocus>

                                    <span v-if="errorsEmail" class="help-block">
                                        <strong>{{emailError}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error' : errorsPassword}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="loginDetails.password" name="password" required>
                                    <span v-if="errorsPassword" class="help-block">
                                        <strong>{{passwordError}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="loginDetails.remember"  name="remember" > Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" @click.prevent="loginPost" class="btn btn-primary">
                                        Login
                                    </button>
                                    <button type="submit" @click.prevent="getUser" class="btn btn-primary">
                                        Get User
                                    </button>

                                    <a class="btn btn-link" href="">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                loginDetails:{
                    email:'',
                    password:'',
                    remember:true
                },
                errorsEmail: false,
                errorsPassword: false,
                emailError:null,
                passwordError:null,
                response: null
            }
        },
        methods:{
            getUser(){
                    axios.get('/api/user')
                    .then(response => {
                    console.log(response.data);
                });
            },
            loginPost(){
                let vm = this;
                axios.post('/api/login', vm.loginDetails)
                    .then(function (response) {
                        vm.response = response;
                    })
                    .catch(function (error) {
                        if(error.response){
                            $.each( error.response.data, function( key, value ) {
                                for (var i = 0; i < value.length; i++) {
                                    console.log(value[i])
                                }
                            });
                        }
                    });
            }
        },
        mounted() {
        }
    }
</script>