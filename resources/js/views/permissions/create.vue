<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>Create Permission</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Reader ID" v-model="form.reader_id">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Edition ID" v-model="form.edition_id">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Creation Date" v-model="form.creation_date"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Expiry Date" v-model="form.expiry_date"></datepicker>
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
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
                form : {
                    reader_id     : null,
                    edition_id    : null,
                    creation_date : null,
                    expiry_date   : null,
                }
            }
        },
        methods : {
            submit: function () {
                this.$store.commit('startLoading');

                axios.post('/api/permissions', this.form)
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