<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Create Edition Token (Access Specific Edition)</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="User Key" v-model="form.user">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Edition ID" v-model="form.edition">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit</button>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                form: {
                    user: '',
                    edition: '',
                }
            }
        },
        methods: {
            submit: function () {
                this.$store.commit('startLoading');

                axios.post('/api/sso/edition', this.form )
                    .then((response) => {
                        this.$store.commit('setResponse', response.data);
                    })
                    .catch((error) => {
                        if (error.response) {
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