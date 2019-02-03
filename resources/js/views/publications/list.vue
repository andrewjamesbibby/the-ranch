<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>List Publications</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Name" v-model="form.name">
                </div>
            </div>
            <div class="is-divider" data-content="Enabled Devices"></div>
            <div class="field is-unselectable">
                <input id="iDeviceEnabled" type="checkbox" class="switch is-rounded is-success" v-model="form.iDeviceEnabled" :checked="form.iDeviceEnabled">
                <label for="iDeviceEnabled"><strong>iDeviceEnabled</strong></label>
            </div>
            <div class="field is-unselectable">
                <input id="androidEnabled" type="checkbox" class="switch is-rounded is-success" v-model="form.androidEnabled" :checked="form.androidEnabled">
                <label for="androidEnabled"><strong>androidEnabled</strong></label>
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
                form: {
                    name : '',
                    iDeviceEnabled : true,
                    androidEnabled : true,
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');
                axios.get('/api/publications', { params : this.form })
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