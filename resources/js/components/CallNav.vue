<template>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light d-none" v-if="onCall" style="background-color: #ebeef0">
        <div class="ml-auto">
            <span style="color: red;">{{ callTime }}</span><span class="mr-2"> - In call with {{ name ? name : '' }} <span v-if="phoneNumber">({{ phoneNumber | phone }})</span> </span>
            <button class="btn btn-danger" @click="hangUp">Hang Up</button>
        </div>
    </nav>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light d-none" v-else-if="showingCall" style="background-color: #ebeef0">
        <div class="ml-auto">
            <router-link :to="{ name: 'calls' }">
                <button class="btn btn-info" @click="close">View Call Log</button>
            </router-link>
            <button class="btn btn-flat" style="min-width: 35px; max-width: 35px; padding: 0.375rem 0;" @click="close"><i class="fas fa-times"></i></button>
        </div>
    </nav>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex'

    export default {
        computed: {
            callTime() {
                let seconds = (this.time % 60)

                return Math.floor(this.time / 60) + ':' + (seconds < 10 ? '0' + seconds : seconds)
            },

            ...mapGetters({
                phoneNumber: 'getPhoneNumber',
                onCall: 'getOnCall',
                showingCall: 'getShowingCall',
                time: 'getTime',
                name: 'getName',
            })
        },

        methods: {
            hangUp() {
                this.endCall()
            },

            close() {
                this.setShowingCall(false)
            },

            ...mapActions([
                'endCall'
            ]),

            ...mapMutations([
                'setShowingCall'
            ])
        }
    }
</script>