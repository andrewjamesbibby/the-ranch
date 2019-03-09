<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>List Editions</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Name" v-model="form.name">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Subscription" v-model="form.subscription">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Published Before" v-model="form.publishedDate_before"></datepicker>
                 </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Published After" v-model="form.publishedDate_after"></datepicker>
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
                    name             : '',
                    subscription     : '',
                    publishedDate_before : '',
                    publishedDate_after  : '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');

                axios.get('/api/editions', {
                    params : this.filtered
                })
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
        },
    }
</script>