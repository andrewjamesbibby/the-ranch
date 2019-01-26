<template>
    <div class="columns">
        <main-menu></main-menu>
        <main-window>
            <slot></slot>
        </main-window>
        <response-window></response-window>
    </div>
</template>

<script>
    import mainMenu from '../../components/main-menu';
    import mainWindow from "../../components/main-window";
    import responseWindow from "../../components/response-window";
    export default {
        name : 'mainLayout',
        components : { mainMenu, mainWindow, responseWindow },
    }
</script>