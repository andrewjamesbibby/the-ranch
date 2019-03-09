<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Create Subscription Period</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Reader ID" v-model="form.reader">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Subscription ID" v-model="form.subscription">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Start Date" v-model="form.startDate"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Expiry Date" v-model="form.expiryDate"></datepicker>
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
    import Datepicker from 'vuejs-datepicker';
    export default {
        components : { Datepicker },
        data : function(){
            return {
                form : {
                    reader : '',
                    subscription : '',
                    startDate : '',
                    expiryDate : '',
                }
            }
        },
        methods : {
        submit: function () {
            this.$store.commit('startLoading');
            axios.post('/api/subscription-periods', this.filtered)
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