<template>
    <div class="modal" v-bind:class="{ 'is-active' : active }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">API Credentials</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <form>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Publisher Key" v-model="key">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Pubisher Secret" v-model="secret">
                        </div>
                    </div>
                </form>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="saveCredentials">Save</button>
                <button class="button" @click="closeModal">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        data : function(){
            return {
                active : true
            }
        },
        methods : {
            closeModal : function() {
                this.active = false;
            },
            saveCredentials : function(){
                this.active = false;
            }
        }
    }
</script>

<style scoped>

</style>