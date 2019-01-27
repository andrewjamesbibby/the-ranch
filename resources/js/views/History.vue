<template>
    <main-layout>
        <div class="tabs">
            <ul>
                <li class="is-active"><a>History</a></li>
            </ul>
        </div>
        <table class="table is-narrow is-fullwidth">
            <thead>
            <tr>
                <th>Time</th>
                <th>Request</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in history">
            <tr @click="showHistory(index)" v-bind:class="{ 'is-active' : historyRowActive(index) }">
                <td>{{ getHumanDate(item.request.query.timestamp) }}</td>
                <td>{{ item.request.method }} /{{ item.request.resource }}</td>
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
                return moment.unix(timestamp).format("h:mm a");
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

    tr.is-active {
        background-color: #ececec;
    }

    tbody tr:hover {
        background-color: #dadada;
    }
</style>