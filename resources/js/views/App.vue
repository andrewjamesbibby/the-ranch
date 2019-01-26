<template>
    <div>
        <settings-modal></settings-modal>
        <div class="loading-overlay" v-if="loading"></div>
        <top-nav></top-nav>
        <router-view></router-view>
    </div>
</template>
<script>
    import topNav from '../components/top-nav';
    import settingsModal from '../components/settings-modal';
    export default {
        components : { settingsModal, topNav },
    }
</script>
