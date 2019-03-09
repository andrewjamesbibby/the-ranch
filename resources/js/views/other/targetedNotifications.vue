<template>
    <div>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">Send Targeted Notification</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Node ID" v-model="nodeId">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Title" v-model="title">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Message" v-model="message">
                            </div>
                        </div>
                        <div class="mb-20">
                            <label class="label is-unselectable">
                                Publisher Subscribers
                                <span class="is-pulled-right"><i @click="addPublisherSubscriber" class="fa fa-plus"></i></span>
                                <span class="is-pulled-right"><i @click="removePublisherSubscriber" class="fa fa-minus"></i></span>
                            </label>
                            <div class="field" v-for="subscriber in publisherSubscribers">
                                <div class="control" >
                                    <input class="input" type="text" placeholder="Publisher Username" v-model="subscriber.token">
                                </div>
                            </div>
                        </div>
                        <div class="mb-20">
                            <label class="label is-unselectable">
                                3rd Party Subscribers
                                <span class="is-pulled-right"><i @click="addThirdPartySubscriber" class="fa fa-plus"></i></span>
                                <span class="is-pulled-right"><i @click="removeThirdPartySubscriber" class="fa fa-minus"></i></span>
                            </label>
                            <div class="field" v-for="subscriber in thirdPartySubscribers">
                                <div class="control" >
                                    <input class="input" type="text" placeholder="Third Party Token" v-model="subscriber.token">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select v-model="priority">
                                        <option value="" disabled selected>Priority</option>
                                        <option value="DEFAULT">Default</option>
                                        <option value="HIGH">High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <p class="control">
                                <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .fa-plus {
        color: green;
        cursor: pointer;
        padding: 0px 5px 0px 15px;
    }
    .fa-minus {
        color: red;
        cursor: pointer;
    }
</style>
<script>
    export default {
        data : function(){
            return {
                nodeId: '',
                title : '',
                message : '',
                publisherSubscribers  : [ { token : '' } ],
                thirdPartySubscribers : [ { token : '' } ],
                priority : '',
            }
        },
        computed : {
            loading : function () {
                return this.$store.state.loading;
            },
        },
        methods : {
            submit: function () {
                var self = this;
                self.$store.commit('startLoading');

                axios.post('/api/targeted-notifications', {
                    publisherKey          : self.$store.state.credentials.key,
                    publisherSecret       : self.$store.state.credentials.secret,
                    nodeId                : self.nodeId,
                    title                 : self.title,
                    message               : self.message,
                    publisherSubscribers  : self.publisherSubscribers,
                    thirdPartySubscribers : self.thirdPartySubscribers,
                    priority              : self.priority,
                })
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log(error);
                    if(error.response){
                        alert(error.response.data.message)
                    }
                })
                .then(function() {
                    self.$store.commit('stopLoading');
                });
            },
            addPublisherSubscriber : function(){
                this.publisherSubscribers.push({ token : '' });
            },
            removePublisherSubscriber : function(){
                this.publisherSubscribers.pop();
            },
            addThirdPartySubscriber : function(){
                this.thirdPartySubscribers.push({ token : '' });
            },
            removeThirdPartySubscriber : function(){
                this.thirdPartySubscribers.pop();
            }
        }
    }
</script>