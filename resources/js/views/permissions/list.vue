<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>List Permissions</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Permission ID" v-model="form.id">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Reader ID" v-model="form.reader">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Edition ID" v-model="form.edition">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Creation Date" v-model="form.creationDate"></datepicker>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Filter By: Expiry Date" v-model="form.expiryDate"></datepicker>
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
                    id : '',
                    reader   : '',
                    edition    : '',
                    creationDate : '',
                    expiryDate   : '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');

                axios.get('/api/permissions', {
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