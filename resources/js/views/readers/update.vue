<template>
    <div>
        <div class="box">
            <strong>Update Reader</strong>
            <p>Update a publisher reader</p>
        </div>

        <form>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Reader ID" v-model="readerId">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Username" v-model="username">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Email" v-model="emailAddress">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="First Name" v-model="firstName">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Last Name" v-model="lastName">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="password" v-model="password">
                </div>
            </div>

            <div class="field">
                <p class="control">
                    <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                </p>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        components: { },
        data : function(){
            return {
                readerId : null,
                username : '',
                emailAddress : '',
                firstName : '',
                lastName : '',
                password : '',
                loading : false,
            }
        },
        methods : {
            submit: function () {
                var self = this;

                self.loading = true;

                axios.put('/api/readers/' + self.readerId, {
                    'username'     : self.username,
                    'emailAddress' : self.emailAddress,
                    'firstName'    : self.firstName,
                    'lastName'     : self.lastName,
                    'password'     : self.password,
                })
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    self.loading = false;
                });
            }
        }
    }
</script>