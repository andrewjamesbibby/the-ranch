<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>List Reader Logins</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Reader" v-model="form.reader">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Node" v-model="form.node">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Login before" v-model="form.loginDate_before"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Login after" v-model="form.loginDate_after"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Platform" v-model="form.platform"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Email" v-model="form.email">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        components : { Datepicker },
        data : function(){
            return {
                form: {
                    reader: '',
                    node: '',
                    loginDate_before: '',
                    loginDate_after: '',
                    platform: '',
                    email: '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');
                axios.get('/api/reader-logins', { params : this.filtered })
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