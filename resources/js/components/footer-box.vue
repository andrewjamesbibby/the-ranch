<template>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <span class="is-unselectable"><strong class="glow">THE RANCH</strong> by ajb </span>
                <span>
                    <a target="_blank" href="https://github.com/andrewjamesbibby/the-ranch">
                        <i class="fab fa-github-square fa-2x"></i>
                    </a>
                </span>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        name: "footer-box"
    }
</script>
<style scoped>
    #footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5vh;
        background-color: #ececec;
    }
    span {
        display: inline-block;
        vertical-align: middle;
        padding-left: 0.2em;
    }
    span a {
        color: black;
    }
    span a:hover {
        color: orange;
    }

</style>
