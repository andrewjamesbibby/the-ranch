<template>
    <div class="columns">
        <main-menu></main-menu>
        <main-window>
            <slot></slot>
        </main-window>
        <response-window></response-window>
        <footer-box></footer-box>
    </div>
</template>

<script>
    import mainMenu from '../../components/main-menu';
    import mainWindow from "../../components/main-window";
    import responseWindow from "../../components/response-window";
    import footerBox from "../../components/footer-box";
    export default {
        name : 'mainLayout',
        components : { mainMenu, mainWindow, responseWindow, footerBox },
    }
</script>