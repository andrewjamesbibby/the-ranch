<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>List Editions</a></li>
            </ul>
        </div>
        <form>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Name" v-model="name">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Subscription" v-model="subscription">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Published Before" v-model="published_before">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Published After" v-model="published_after">
                </div>
            </div>
            <div class="field">
                <label class="label">iOS Published</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="iOSPublished" checked>
                        True
                    </label>
                    <label class="radio">
                        <input type="radio" name="iOSPublished">
                        False
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Android Published</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="androidPublished" checked>
                        True
                    </label>
                    <label class="radio">
                        <input type="radio" name="androidPublished">
                        False
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">HTML Published</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="htmlPublished" checked>
                        True
                    </label>
                    <label class="radio">
                        <input type="radio" name="htmlPublished">
                        False
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Web Published</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="webPublished" checked>
                        True
                    </label>
                    <label class="radio">
                        <input type="radio" name="webPublished">
                        False
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Flash Published</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="flashPublished" checked>
                        True
                    </label>
                    <label class="radio">
                        <input type="radio" name="flashPublished">
                        False
                    </label>
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                </p>
            </div>
        </form>
    </main-layout>
</template>

<script>
    export default {
        data : function(){
            return {
                editionId      : '',
                name           : '',
                publishedDate  : '',
            }
        },
        methods : {
            submit: function() {
                var self = this;
                self.$store.commit('startLoading');

                axios.get('/api/editions', {
                    params : {
                        publisherKey    : self.$store.state.credentials.key,
                        publisherSecret : self.$store.state.credentials.secret,
                        editionId       : self.editionId,
                        name            : self.name,
                        publishedDate   : self.publishedDate,
                    }
                })
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    if(error.response){
                        alert(error.response.data.message)
                    }
                })
                .then(function() {
                    self.$store.commit('stopLoading');
                });
            }
        }
    }
</script>