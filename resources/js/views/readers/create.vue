<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Create Reader</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Username" v-model="form.username">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Email" v-model="form.emailAddress">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="First Name" v-model="form.firstName">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Last Name" v-model="form.lastName">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Password" v-model="form.password">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
                </p>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        data : function(){
            return {
                form : {
                    username     : '',
                    emailAddress : '',
                    firstName    : '',
                    lastName     : '',
                    password     : '',
                }
            }
        },
        methods : {
            submit: function () {
                this.$store.commit('startLoading');

                axios.post('/api/readers', this.form)
                .then((response) => {
                    this.$store.commit('setResponse' , response.data);
                })
                .catch((error) => {
                    if(error.response){
                        this.toast('error', error.response.data.message);
                    }
                })
                .then(() => {
                    this.$store.commit('stopLoading');
                });
            }
        }
    }
</script>