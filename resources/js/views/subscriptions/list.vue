<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>List Subscriptions</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Title" v-model="form.title">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Device Title" v-model="form.onDeviceTitle">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Subscription Type" v-model="form.subscriptionType">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Node" v-model="form.node">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Reader" v-model="form.reader">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Ediiton" v-model="form.edition">
                </div>
            </div>
            <div class="field is-unselectable">
                <input id="isDisabled" type="checkbox" class="switch is-rounded is-success" v-model="form.disabled" :checked="form.disabled">
                <label for="isDisabled"><strong>Disabled</strong></label>
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
    export default {
        data : function(){
            return {
                form: {
                    title : '',
                    onDeviceTitle : '',
                    disabled : false,
                    subscriptionType : '',
                    node : '',
                    reader : '',
                    edition : '',
                }
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');
                axios.get('/api/subscriptions', { params : this.filtered })
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