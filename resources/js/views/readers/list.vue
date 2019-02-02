<template>
    <main-layout>
    <div class="tabs single-use">
        <ul>
            <li><a>List Readers</a></li>
        </ul>
    </div>
    <form @submit.prevent="submit">
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Email Address" v-model="form.emailAddress">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Username" v-model="form.username">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: First Name" v-model="form.firstName">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Last Name" v-model="form.lastName">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Node Id" v-model="form.nodeId">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Subscription" v-model="form.subscription">
            </div>
        </div>
        <div class="field">
            <p class="control has-text-right">
                <button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
            </p>
        </div>
    </form>
    </main-layout>
</template>

<script>
    export default {
        data : function(){
            return {
                form : {
                    emailAddress    : '',
                    username        : '',
                    firstName       : '',
                    lastName        : '',
                    nodeId          : '',
                    subscription    : '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');
                axios.get('/api/readers', { params : this.form })
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