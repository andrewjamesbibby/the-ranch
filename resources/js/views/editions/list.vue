<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>List Editions</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Name" v-model="form.name">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Filter By: Subscription" v-model="form.subscription">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="datepicker input" type="date" placeholder="Filter By: Published Before" >
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="datepicker input" type="date" placeholder="Filter By: Published After">
                </div>
            </div>
            <div class="field">
                <input id="iOSPublished" type="checkbox" name="iOSPublished" class="switch is-rounded is-success" v-model="form.iOSPublished" :checked="form.iOSPublished">
                <label for="iOSPublished"><strong>iOS Published</strong></label>
            </div>

            <div class="field is-unselectable">
                <input id="androidPublished" type="checkbox" name="androidPublished" class="switch is-rounded is-success" v-model="form.androidPublished" :checked="form.androidPublished">
                <label for="androidPublished"><strong>Android Published</strong></label>
            </div>

            <div class="field is-unselectable">
                <input id="htmlPublished" type="checkbox" name="htmlPublished" class="switch is-rounded is-success" v-model="form.htmlPublished" :checked="form.htmlPublished">
                <label for="htmlPublished"><strong>HTML Published</strong></label>
            </div>

            <div class="field is-unselectable">
                <input id="webPublished" type="checkbox" name="webPublished" class="switch is-rounded is-success" v-model="form.webPublished" :checked="form.webPublished">
                <label for="webPublished"><strong>Web Published</strong></label>
            </div>

            <div class="field is-unselectable">
                <input id="flashPublished" type="checkbox" name="flashPublished" class="switch is-rounded is-success" v-model="form.flashPublished" :checked="form.flashPublished">
                <label for="flashPublished"><strong>Flash Published</strong></label>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
                </p>
            </div>
        </form>
    </main-layout>
</template>

<script>
    export default {
        data : function(){
            return {
                form : {
                    name             : '',
                    subscription     : '',
                    published_before : null,
                    published_after  : null,
                    iOSPublished     : true,
                    androidPublished : true,
                    htmlPublished    : true,
                    webPublished     : false,
                    flashPublished   : false,
                }
            }
        },
        mounted : function(){
            bulmaCalendar.attach('.datepicker', {});
        },
        methods : {
            submit: function() {

                this.$store.commit('startLoading');

                axios.get('/api/editions', {
                    params : this.form
                })
                .then((response) => {
                    this.$store.commit('setResponse' , response.data);
                })
                .catch((error) => {
                    if(error.response){
                        this.toast('error', error.response.data.message);
                    }
                })
                .then(() => {
                    this.$store.commit('stopLoading');
                });
            }
        }
    }
</script>