<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Welcome to the ranch</a></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-content">
                <p><strong>The Ranch</strong> is a project designed to make requests to the YUDU Publisher REST API without writing any code. To use this tool a Publisher Key and Secret are required.</p>
                <p>If you prefer to run locally, the source code for this project can be found on Github <a target="_blank" href="https://github.com/andrewjamesbibby/the-ranch">here</a>. Documentation for the YUDU Publisher REST API can found <a target="_blank" href="https://github.com/YUDUcreative/Publisher-REST-API-Library">here</a>. The Publisher REST API wrapper is on packagist <a target="_blank" href="https://packagist.org/packages/yudu/publisher">here</a>
                <p><strong>Problems?</strong> Please open an issue on this projects github issues page.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="start"><strong>Start by entering API credentials: </strong> </span>
                <router-link class="button is-light" to="/credentials">
                    <span><i class="fa fa-cog"></i> Credentials </span>
                </router-link>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "home",
        methods : {
            openCredentialsModal() {
                this.$store.commit('toggleCredentialsModal', true);
            }
        }
    }
</script>

<style scoped>
    .card p {
        margin-bottom: 0.5em;
    }

    .start {
        display: inline-block;
        vertical-align: middle;
        vertical-align: -webkit-baseline-middle;
        margin-right: 1em;
    }
</style>