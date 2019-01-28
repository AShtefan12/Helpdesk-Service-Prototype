/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import VueCkeditor from 'vue-ckeditor5'
import VueInputAutowidth from 'vue-input-autowidth'
import router from './routes'
import store from './store'
import './filters'

Vue.use(VueCkeditor.plugin, {
    editors: {
        classic: ClassicEditor,
    },
    name: 'ckeditor'
});
Vue.use(VueInputAutowidth);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('problem', require('./components/Problems/Problem.vue'));
Vue.component('call', require('./components/Call.vue'));
Vue.component('call-nav', require('./components/CallNav.vue'));

import {mapGetters} from 'vuex'
const app = new Vue({
    el: '#app',

    computed: mapGetters({
        onCall: 'getOnCall',
        showingCall: 'getShowingCall'
    }),

    mounted() {
        var bloodhound = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/search?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });

        $('#problem-search').typeahead({
                hint: false,
                highlight: true,
                minLength: 1
            },
            {
                name: 'users',
                source: bloodhound,
                display: data => data.id,
                templates: {
                    empty: [
                        '<div class="list-group"><div class="list-group-item">No Problem Found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group">'
                    ],
                    suggestion: function (data) {
                        return '<div class="list-group-item">' + data.id + ': ' + data.summary + '</div></div>'
                    }
                }
            })
            .bind('typeahead:select', (ev, suggestion) => {
                console.log('Selection: ' + suggestion);
                this.$router.replace({name: 'problems'})
            });
    },

    methods: {
        manualNewCall() {
            if (!this.onCall) {
                this.$emit('manual-call')
            }
        }
    },

    router,
    store
});
