import Twilio from 'twilio-client'

// state
const state = {
    phoneNumber: null,
    onCall: false,
    showingCall: false,
    time: 0,
    interval: null,
    name: null,
}

// getters
const getters = {
    getPhoneNumber: state => state.phoneNumber,
    getOnCall: state => state.onCall,
    getShowingCall: state => state.showingCall,
    getTime: state => state.time,
    getName: state => state.name,
}

// mutations
const mutations = {
    setPhoneNumber(state, number) {
        state.phoneNumber = number
    },
    setCall(state, call) {
        state.onCall = call
    },
    setShowingCall(state, showing) {
        state.showingCall = showing
    },
    setTime(state, time) {
        state.time = time
    },
    setName(state, name) {
        state.name = name
    }
}

const beforeUnloadFunction = (event) => {
    event.returnValue = "If you leave, your current call will be dropped."
}

// actions
const actions = {
    startCall ({ state, commit, dispatch }, phoneNumber) {
        state.interval = setInterval(() => {
            dispatch('incrementTime')
        }, 1000)
        window.addEventListener('beforeunload', beforeUnloadFunction);
        commit('setCall', true)
        commit('setPhoneNumber', phoneNumber)
    },
    endCall ({ state, commit }) {
        Twilio.Device.disconnectAll();
        clearInterval(state.interval)
        window.removeEventListener("beforeunload", beforeUnloadFunction);
        commit('setTime', 0)
        commit('setCall', false)
        commit('setName', null)
        commit('setShowingCall', true)
    },
    incrementTime ({ state, commit }) {
        commit('setTime', state.time + 1)
    }
}

export default {
    state,
    mutations,
    actions,
    getters
};