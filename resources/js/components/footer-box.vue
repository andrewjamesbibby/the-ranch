<template>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <span><strong class="glow">NEVERLAND</strong> by ajb </span>
                <span>
                    <a target="_blank" href="https://github.com/andrewjamesbibby/neverland-rest-api-playground">
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
