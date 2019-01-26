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
                <div class="content">
                    <input class="offscreen" type="text" id="requestRaw" :value="lastRequest.raw"></input>
                    <pre>{{ lastRequest.raw }}</pre>
                </div>
            </div>
        </div>

        <div class="response card">
            <header class="card-header">
                <p class="card-header-title">
                    Response &nbsp;
                    <span v-if="lastRequest.statusCode" v-html="statusCodeTag"></span>
                </p>
                <a href="#" class="card-header-icon" aria-label="copy" @click="copyToClipboard('requestBody')">
                            <span class="icon">
                              <i class="far fa-copy" aria-hidden="true"></i>
                            </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <input class="offscreen" type="text" id="requestBody" :value="lastRequest.body"></input>
                    <pre>{{ lastRequest.body }}</pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed : {
            lastRequest : function() {
                return this.$store.state.lastRequest;
            },
            statusCodeTag : function(){
                if(_.includes([ 200, 201, 200 ], this.lastRequest.statusCode)){
                    return `<span class="tag is-success is-medium">${ this.lastRequest.statusCode }</span>`;
                }
                if(_.includes([ 400, 401, 403, 404, 405, 429, 500 ], this.lastRequest.statusCode)){
                    return `<span class="tag is-danger is-medium">${ this.lastRequest.statusCode }</span>`;
                }
                return `<span class="tag is-danger is-default">${ this.lastRequest.statusCode }</span>`;
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
