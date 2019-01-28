import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import Call from './modules/call'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Call
    }
})