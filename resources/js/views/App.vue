<template>
    <div>
        <div class="loading-window" v-if="loading"></div>

        <nav class="navbar has-shadow">

        </nav>

        <div class="columns">

            <aside class="column is-2 aside hero is-fullheight">
                <div>
                    <div class="main">
                        <router-link to="/readers" class="item">
                            <span class="icon"><i class="fa fa-book-reader"></i></span><span class="name">Readers</span>
                        </router-link>

                        <router-link to="/editions" class="item">
                            <span class="icon"><i class="fa fa-book-open"></i></span><span class="name">Editions</span>
                        </router-link>

                        <router-link :to="{ name: 'permissions' }" class="item">
                            <span class="icon"><i class="fa fa-key"></i></span><span class="name">Permissions</span>
                        </router-link>

                        <router-link :to="{ name: 'reader-logins' }" class="item">
                            <span class="icon"><i class="fa fa-sign-in-alt"></i></span><span class="name">Reader Logins</span>
                        </router-link>

                        <router-link :to="{ name: 'publications' }" class="item">
                            <span class="icon"><i class="fa fa-newspaper"></i></span><span class="name">Publications</span>
                        </router-link>

                        <router-link :to="{ name: 'subscriptions' }" class="item">
                            <span class="icon"><i class="fa fa-list-alt"></i></span><span class="name">Subscriptions</span>
                        </router-link>

                        <router-link :to="{ name: 'subscription-periods' }" class="item">
                            <span class="icon"><i class="fa fa-clock"></i></span><span class="name">Subscription Periods</span>
                        </router-link>

                        <router-link :to="{ name: 'devices' }" class="item">
                            <span class="icon"><i class="fa fa-tablet-alt"></i></span><span class="name">Devices</span>
                        </router-link>

                        <router-link :to="{ name: 'authentication' }" class="item">
                            <span class="icon"><i class="fa fa-unlock"></i></span><span class="name">Authentication</span>
                        </router-link>

                        <router-link :to="{ name: 'sso-tokens' }" class="item">
                            <span class="icon"><i class="fa fa-globe"></i></span><span class="name">SSO Tokens</span>
                        </router-link>

                        <router-link :to="{ name: 'targeted-notifications' }" class="item">
                            <span class="icon"><i class="fa fa-broadcast-tower"></i></span><span class="name">Targeted Notifications</span>
                        </router-link>

                    </div>
                </div>
            </aside>

            <div id ="builder" class="column is-5 is-fullheight">
                <router-view></router-view>
            </div>

            <div id="response" class="column is-5">

                <div class="card mb-10">
                    <header class="card-header">
                        <p class="card-header-title">Request</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            // request variables and other stuff in here.
                            // If can get raw request even better!
                        </div>
                    </div>
                </div>

                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">Response</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <span class="tag is-medium is-success"> 200 </span>
                            <pre>{{ lastRequest }}</pre>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
<script>
    export default {
        data : function(){
            return {

            }
        },
        computed : {
            loading : function () {
                return this.$store.state.loading;
            },
            lastRequest : function() {
                return this.$store.state.lastRequest;
            }
        }
    }
</script>