<template>
    <div>
        <div class="box">
            <strong>Delete Reader</strong>
            <p>Delete a publisher reader</p>
        </div>

        <form>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Reader ID" v-model="readerId">
                </div>
            </div>
            <div class="field">
                <p class="control">
                    <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                </p>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        components: { },
        data : function(){
            return {
                readerId : null,
                loading : false,
            }
        },
        methods : {
            submit: function () {
                var self = this;

                self.loading = true;

                axios.delete('/api/readers/' + self.readerId)
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    self.loading = false;
                });
            }
        }
    }
</script>