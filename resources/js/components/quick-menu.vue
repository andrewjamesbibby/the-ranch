<template>
    <div id="quickviewDefault" class="quickview">
        <header class="quickview-header">
            <p class="title">&nbsp;</p>
            <span class="delete" data-dismiss="quickview"></span>
        </header>

        <div class="quickview-body">
            <div class="quickview-block">
                <main-menu></main-menu>
            </div>
        </div>

        <footer class="quickview-footer">

        </footer>
    </div>
</template>

<script>
    import mainMenu from '../components/main-menu';
    export default {
        name: "quick-menu",
        components : {
            mainMenu
        }
    }
</script>

<style scoped>

</style>