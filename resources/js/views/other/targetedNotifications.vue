<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>Targeted Notifications</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
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
                        <span class="is-pulled-right"><i @click="removePublisherSubscriber"
                                                         class="fa fa-minus"></i></span>
                    </label>
                    <div class="field" v-for="subscriber in publisherSubscribers">
                        <div class="control">
                            <input class="input" type="text" placeholder="Publisher Username"
                                   v-model="subscriber.token">
                        </div>
                    </div>
                </div>
                <div class="mb-20">
                    <label class="label is-unselectable">
                        3rd Party Subscribers
                        <span class="is-pulled-right"><i @click="addThirdPartySubscriber" class="fa fa-plus"></i></span>
                        <span class="is-pulled-right"><i @click="removeThirdPartySubscriber"
                                                         class="fa fa-minus"></i></span>
                    </label>
                    <div class="field" v-for="subscriber in thirdPartySubscribers">
                        <div class="control">
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
                        <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }">
                            Submit </a>
                    </p>
                </div>
            </form>
        </form>
    </main-layout>
</template>

<script>
    export default {
        data: function () {
            return {
                nodeId: '',
                title: '',
                message: '',
                publisherSubscribers: [{token: ''}],
                thirdPartySubscribers: [{token: ''}],
                priority: '',
            }
        },
        computed: {
            loading: function () {
                return this.$store.state.loading;
            },
        },
        methods: {
            submit: function () {
                this.$store.commit('startLoading');

                axios.post('/api/targeted-notifications', {
                    nodeId: this.nodeId,
                    title: this.title,
                    message: this.message,
                    publisherSubscribers: this.publisherSubscribers.map((subscriber) => { return subscriber.token; }),
                    thirdPartySubscribers: this.thirdPartySubscribers.map((subscriber) => { return subscriber.token; }),
                    priority: this.priority,
                })
                .then((response) => {
                    console.log(response);
                    this.$store.commit('setResponse', response.data);
                })
                .catch((error) => {
                    if (error.response) {
                        alert(error.response.data.message)
                    }
                })
                .then(() => {
                    this.$store.commit('stopLoading');
                });
            },
            addPublisherSubscriber: function () {
                this.publisherSubscribers.push({token: ''});
            },
            removePublisherSubscriber: function () {
                this.publisherSubscribers.pop();
            },
            addThirdPartySubscriber: function () {
                this.thirdPartySubscribers.push({token: ''});
            },
            removeThirdPartySubscriber: function () {
                this.thirdPartySubscribers.pop();
            }
        }
    }
</script>

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