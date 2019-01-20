<template>
    <div>
        <div class="tabs is-toggle is-fullwidth is-small">
            <ul>
                <router-link tag="li" to="/readers/list"><a href="">List</a></router-link>
                <router-link tag="li" to="/readers/find"><a href="">Find</a></router-link>
                <router-link tag="li" to="/readers/create"><a href="">Create</a></router-link>
                <router-link tag="li" to="/readers/update"><a href="">Update</a></router-link>
                <router-link tag="li" to="/readers/delete"><a href="">Delete</a></router-link>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>


