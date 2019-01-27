<template>
    <main-layout>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">Request History</p>
            </header>
        </div>

        <table class="table is-narrow is-fullwidth is-bordered">
            <thead>
            <tr>
                <th>Time</th>
                <th>Request</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in history">
            <tr @click="showHistory(index)" v-bind:class="{ 'is-active' : historyRowActive(index) }">
                <td>{{ getHumanDate(item.timestamp) }}</td>
                <td>{{ item.action }}</td>
                <td v-html="statusCodeTag(item.statusCode)"></td>
            </tr>
            </tbody>
        </table>
    </main-layout>
</template>

<script>
    export default {
        name: "history",
        computed : {
            history : function(){
                return this.$store.state.history;
            },
            activeResponseIndex : function(){
                return this.$store.state.activeResponseIndex;
            }
        },
        methods : {
            showHistory : function(index){
                this.$store.commit('setActiveResponseIndex', index);
            },
            getHumanDate : function (timestamp){
                return moment(timestamp).format("h:mm a");
            },
            statusCodeTag : function(statusCode){
                if(_.includes([ 200, 201, 200 ], statusCode)){
                    return `<span class="tag is-success is-small">${ statusCode }</span>`;
                }
                if(_.includes([ 400, 401, 403, 404, 405, 429, 500 ], statusCode)){
                    return `<span class="tag is-danger is-small">${ statusCode }</span>`;
                }
                return `<span class="tag is-default is-small">${ statusCode }</span>`;
            },
            historyRowActive : function(index){
                return index == this.activeResponseIndex;
            }
        }
    }
</script>

<style scoped>
    .table td, th {
        text-align: center;
    }
    .table tr {
        cursor: pointer;
    }

    tbody tr:hover, tr.is-active {
        background-color: #ececec;
    }

</style>