<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>List Subscription Periods</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: ID" v-model="form.id">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Reader" v-model="form.reader">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Subscription" v-model="form.subscription">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Start Date" v-model="form.startDate"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Expiry Date" v-model="form.expiryDate"></datepicker>
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
    import Datepicker from 'vuejs-datepicker';
    export default {
        components : { Datepicker },
        data : function(){
            return {
                form: {
                    id : '',
                    reader : '',
                    subscription : '',
                    startDate : '',
                    expiryDate : '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');
                axios.get('/api/subscription-periods', { params : this.filtered })
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