<template>
    <div id="output" class="column is-6">
        <div class="request card mb-20">
            <header class="card-header">
                <p class="card-header-title">Raw</p>
                <a href="#" class="card-header-icon" aria-label="copy" @click="copyToClipboard('requestRaw')">
                    <span class="icon">
                      <i class="far fa-copy" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content" v-if="activeResponse">
                    <input class="offscreen" type="text" id="requestRaw" :value="activeResponse.raw"></input>
                    <pre>{{ activeResponse.raw }}</pre>
                </div>
            </div>
        </div>

        <div class="response card">
            <header class="card-header">
                <p class="card-header-title">
                    Response &nbsp;
                    <span v-if="activeResponse" v-html="statusCodeTag"></span>
                </p>
                <a href="#" class="card-header-icon" aria-label="copy" @click="copyToClipboard('requestBody')">
                    <span class="icon">
                      <i class="far fa-copy" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content" v-if="activeResponse">
                    <input class="offscreen" type="text" id="requestBody" :value="activeResponse.body"></input>
                    <pre>{{ activeResponse.body }}</pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed : {
            activeResponse : function(){
                return this.$store.state.history[this.$store.state.activeResponseIndex];
            },
            statusCodeTag : function(){
                if(_.includes([ 200, 201, 200 ], this.activeResponse.statusCode)){
                    return `<span class="tag is-success is-medium">${ this.activeResponse.statusCode }</span>`;
                }
                if(_.includes([ 400, 401, 403, 404, 405, 429, 500 ], this.activeResponse.statusCode)){
                    return `<span class="tag is-danger is-medium">${ this.activeResponse.statusCode }</span>`;
                }
                return `<span class="tag is-danger is-default">${ this.activeResponse.statusCode }</span>`;
            },
        },
        methods : {
            copyToClipboard : function(element){
                let copyText = document.getElementById(element);
                copyText.select();
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            },
        }
    }
</script>

<style scoped>
    .offscreen {
        opacity: 0;
        position: absolute;
        z-index: -9999;
        pointer-events: none;
    }
</style>
