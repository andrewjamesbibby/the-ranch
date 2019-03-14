<template>
    <div id="main-nav" class="menu">
        <ul class="menu-list">
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-book-reader"></i></span>Readers</p>
                <ul>
                    <router-link tag="li" to="/readers/list"><a href="#">List Readers</a></router-link>
                    <router-link tag="li" to="/readers/find"><a href="#">Find Reader</a></router-link>
                    <router-link tag="li" to="/readers/create"><a href="">Create Reader</a></router-link>
                    <router-link tag="li" to="/readers/update"><a href="">Update Reader</a></router-link>
                    <router-link tag="li" to="/readers/delete"><a href="">Delete</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-book-open"></i></span>Editions</p>
                <ul>
                    <router-link tag="li" to="/editions/list"><a href="">List Editions</a></router-link>
                    <router-link tag="li" to="/editions/find"><a href="">Find Edition</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-key"></i></span>Permissions</p>
                <ul>
                    <router-link tag="li" to="/permissions/list"><a href="">List Permissions</a></router-link>
                    <router-link tag="li" to="/permissions/find"><a href="">Find Permission</a></router-link>
                    <router-link tag="li" to="/permissions/create"><a href="">Create Permission</a></router-link>
                    <router-link tag="li" to="/permissions/update"><a href="">Update Permission</a></router-link>
                    <router-link tag="li" to="/permissions/delete"><a href="">Delete Permission</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-sign-in-alt"></i></span>Reader Logins</p>
                <ul>
                    <router-link tag="li" to="/reader-logins/list"><a href="">List Reader Logins</a></router-link>
                    <router-link tag="li" to="/reader-logins/find"><a href="">Find Reader Login</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-newspaper"></i></span>Publications</p>
                <ul>
                    <router-link tag="li" to="/publications/list"><a href="">List Publications</a></router-link>
                    <router-link tag="li" to="/publications/find"><a href="">Find Publications</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-list-alt"></i></span> Subscriptions</p>
                <ul>
                    <router-link tag="li" to="/subscriptions/list"><a href="">List Subscriptions</a></router-link>
                    <router-link tag="li" to="/subscriptions/find"><a href="">Find Subscription</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-clock"></i></span> Subscription Periods</p>
                <ul>
                    <router-link tag="li" to="/subscription-periods/list"><a href="">List Periods</a></router-link>
                    <router-link tag="li" to="/subscription-periods/find"><a href="">Find Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/create"><a href="">Create Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/update"><a href="">Update Period</a></router-link>
                    <router-link tag="li" to="/subscription-periods/delete"><a href="">Delete Period</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-globe"></i></span>SSO Tokens</p>
                <ul>
                    <router-link tag="li" to="/sso/any"><a href="">Any Token</a></router-link>
                    <router-link tag="li" to="/sso/publication"><a href="">Publication Token</a></router-link>
                    <router-link tag="li" to="/sso/edition"><a href="">Edition Token</a></router-link>
                </ul>
            </li>
            <li>
                <p class="menu-label"><span class="icon"><i class="fa fa-question"></i></span>Other</p>
                <ul>
                    <router-link tag="li" to="/remove-devices"><a href="">Remove Devices</a></router-link>
                    <router-link tag="li" to="/auth-passwords"><a href="">Auth Passwords</a></router-link>
                    <router-link tag="li" to="/targeted-notifications"><a href="">Notifications</a></router-link>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {}
</script>
