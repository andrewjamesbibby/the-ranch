<template>
    <div id="main-nav" class="menu column is-2">
        <ul class="menu-list">
            <li>
                <router-link to="/readers" class="item">
                    <span class="icon"><i class="fa fa-book-reader"></i></span><span class="name">  Readers</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/readers/list"><a href="">List Readers</a></router-link>
                    <router-link tag="li" to="/readers/find"><a href="">Find Reader</a></router-link>
                    <router-link tag="li" to="/readers/create"><a href="">Create Reader</a></router-link>
                    <router-link tag="li" to="/readers/update"><a href="">Update Reader</a></router-link>
                    <router-link tag="li" to="/readers/delete"><a href="">Delete</a></router-link>
                </ul>
            </li>
            <li>
                <router-link to="/editions" class="item">
                    <span class="icon"><i class="fa fa-book-open"></i></span><span class="name"> Editions</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/editions/list"><a href="">List Editions</a></router-link>
                    <router-link tag="li" to="/editions/find"><a href="">Find Edition</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'permissions' }" class="item">
                    <span class="icon"><i class="fa fa-key"></i></span><span class="name"> Permissions</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/permissions/list"><a href="">List Permissions</a></router-link>
                    <router-link tag="li" to="/permissions/find"><a href="">Find Permission</a></router-link>
                    <router-link tag="li" to="/permissions/create"><a href="">Create Permission</a></router-link>
                    <router-link tag="li" to="/permissions/update"><a href="">Update Permission</a></router-link>
                    <router-link tag="li" to="/permissions/delete"><a href="">Delete Permission</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'reader-logins' }" class="item">
                    <span class="icon"><i class="fa fa-sign-in-alt"></i></span><span class="name"> Reader Logins</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/reader-logins/list"><a href="">List Reader Logins</a></router-link>
                    <router-link tag="li" to="/reader-logins/find"><a href="">Find Reader Login</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'publications' }" class="item">
                    <span class="icon"><i class="fa fa-newspaper"></i></span><span class="name"> Publications</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/publications/list"><a href="">List Publications</a></router-link>
                    <router-link tag="li" to="/publications/find"><a href="">Find Publications</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'subscriptions' }" class="item">
                    <span class="icon"><i class="fa fa-list-alt"></i></span><span class="name"> Subscriptions</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/subscriptions/list"><a href="">List Subscriptions</a></router-link>
                    <router-link tag="li" to="/subscriptions/find"><a href="">Find Subscription</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'subscription-periods' }" class="item">
                    <span class="icon"><i class="fa fa-clock"></i></span><span class="name"> Subscription Periods</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/subscription-periods/list"><a href="">List Periods</a></router-link>
                    <router-link tag="li" to="/subscription-periods/find"><a href="">Find Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/create"><a href="">Create Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/update"><a href="">Update Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/delete"><a href="">Delete Period</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'devices' }" class="item">
                    <span class="icon"><i class="fa fa-tablet-alt"></i></span><span class="name"> Remove Devices</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'authentication' }" class="item">
                    <span class="icon"><i class="fa fa-unlock"></i></span><span class="name"> Authenticate Password</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'sso-tokens' }" class="item">
                    <span class="icon"><i class="fa fa-globe"></i></span><span class="name"> SSO Tokens</span>
                </router-link>
                <ul>
                    <router-link tag="li" to="/sso-tokens/any"><a href="">Any Token</a></router-link>
                    <router-link tag="li" to="/sso-tokens/publication"><a href="">Publication Token</a></router-link>
                    <router-link tag="li" to="/sso-tokens/edition"><a href="">Edition Token</a></router-link>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'targeted-notifications' }" class="item">
                    <span class="icon"><i class="fa fa-broadcast-tower"></i></span><span class="name"> Targeted Notifications</span>
                </router-link>
            </li>
        </ul>
    </div>
</template>
