<template>
    <div>
        <settings-modal></settings-modal>
        <div class="loading-overlay" v-if="loading"></div>
        <top-nav></top-nav>
        <div class="columns">
            <quick-menu></quick-menu>
            <main-menu class="column is-hidden-mobile is-hidden-tablet-only is-3-desktop is-2-widescreen"></main-menu>
            <main-window class="column is-6-tablet is-4-desktop is-4-widescreen">
                <router-view></router-view>
            </main-window>
            <response-window class="column is-6-tablet is-5-desktop is-6-widescreen"></response-window>
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
    import QuickMenu from "../components/quick-menu";
    import bulmaQuickview from 'bulma-extensions/bulma-quickview/dist/js/bulma-quickview.min.js'
    export default {
        components : {QuickMenu, settingsModal, topNav, mainMenu, mainWindow, responseWindow, footerBox },
        mounted() {
            bulmaQuickview.attach();
        }
    }
</script>
