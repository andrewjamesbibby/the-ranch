<template>
    <div>
        <div class="tabs is-toggle is-fullwidth is-small">
            <ul>
                <router-link tag="li" to="/editions/list"><a href="">List</a></router-link>
                <router-link tag="li" to="/editions/find"><a href="">Find</a></router-link>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>
