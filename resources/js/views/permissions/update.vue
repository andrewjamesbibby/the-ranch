<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Update Permission</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Permission ID" v-model="permissionId">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <datepicker input-class="input" placeholder="Expiry Date" v-model="form.expiry_date"></datepicker>
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
                permissionId : null,
                form : {
                    expiry_date : null,
                }
            }
        },
        methods : {
            submit: function () {
                this.$store.commit('startLoading');

                axios.put('/api/permissions/' + this.permissionId, this.form)
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