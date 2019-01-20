<template>
    <div>
        <div class="tabs is-toggle is-fullwidth is-small">
            <ul>
                <router-link tag="li" to="/readers/list"><a href="">LIST</a></router-link>
                <router-link tag="li" to="/readers/find"><a href="">FIND</a></router-link>
                <router-link tag="li" to="/readers/create"><a href="">CREATE</a></router-link>
                <router-link tag="li" to="/readers/update"><a href="">UPDATE</a></router-link>
                <router-link tag="li" to="/readers/delete"><a href="">DELETE</a></router-link>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>


