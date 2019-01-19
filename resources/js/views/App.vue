<template>
    <div>
        <nav class="navbar has-shadow">

        </nav>

        <div class="columns">

            <aside class="column is-3 aside hero is-fullheight">
                <div>
                    <div class="main">
                        <router-link to="/readers/find" class="item">
                            <span class="icon"><i class="fa fa-book-reader"></i></span><span class="name">Readers</span>
                        </router-link>

                        <router-link :to="{ name: 'editions' }" class="item">
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

            <div class="column is-4 messages hero is-fullheight" id="message-feed">
                <router-view></router-view>
            </div>

            <div class="column is-5 message hero is-fullheight" id="message-pane">

                // xml here !

            </div>

        </div>

    </div>
</template>
<script>
    export default {}
</script>