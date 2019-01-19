<template>
    <div>
        <div class="box">
            <strong>Find Readers</strong>
            <p>Find a publisher reader by ID. (blank returns all)</p>
        </div>

        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Reader ID">
            </div>
        </div>

        <div class="field">
            <p class="control">
                <a @click="submit" class="button is-primary"> Submit </a>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        components: { },
        data : function(){
            return {
                loading : false
            }
        },
        methods : {
            submit: function () {
                axios.get('/api/readers')
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                    // stop spinners?
                    console.log('always');
                });
            }
        }
    }
</script>