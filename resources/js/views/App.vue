<template>
    <div>
        <settings-modal></settings-modal>
        <div class="loading-overlay" v-if="loading"></div>
        <top-nav></top-nav>
        <div class="columns">
            <main-menu></main-menu>
            <main-window>
                <router-view></router-view>
            </main-window>
            <response-window></response-window>
            <footer-box></footer-box>
        </div>
    </div>
</template>
<script>
    import topNav from '../components/top-nav';
    import settingsModal from '../components/settings-modal';
    import mainMenu from '../components/main-menu';
    import mainWindow from "../components/main-window";
    import responseWindow from "../components/response-window";
    import footerBox from "../components/footer-box";
    export default {
        components : { settingsModal, topNav, mainMenu, mainWindow, responseWindow, footerBox },
    }
</script>
