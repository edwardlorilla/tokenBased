<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group" :class="{'has-error' : hasErrors.name}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           v-model="registerData.name" required autofocus>
                                    <span v-if="hasErrors.name" class="help-block">
                                        <strong>{{errorMessage.name}}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error' : hasErrors.email}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           v-model="registerData.email" required>
                                    <span v-if="hasErrors.email" class="help-block">
                                        <strong>{{errorMessage.email}}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error' : hasErrors.password}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                           v-model="registerData.password" required>
                                    <span v-if="hasErrors.password" class="help-block">
                                        <strong>{{errorMessage.password}}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" v-model="registerData.password_confirmation"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="registerPost()">
                                        Register
                                    </button>
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

    export default{
        data(){
            return{
                registerData:{
                    name:'',
                    email:'',
                    password:'',
                    password_confirmation:''
                },
                hasErrors:{
                    name:false,
                    email:false,
                    password:false
                },
                errorMessage:{
                    name:null,
                    email:null,
                    password:null
                }
                //passwordMatch:null
            }
        },
        methods:{
            registerPost(){
                var _this = this
                var vm = this.hasErrors
                var _vm = this.errorMessage
                axios.post('/api/register', _this.registerData)
                .then(function (response) {
                console.log(response);
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
        }
        /*
            computed:{
                passwordValidate(){
                    var vm = this.registerData;
                    var _this = this
                    return vm.password_confirmation !== vm.password  ? _this.passwordMatch = 'The password confirmation does not match.'  : _this.passwordMatch = null
                }
            }
        */
    }


</script>
