<template>
    <div v-if="newCall">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Incoming Call</h5>
                            </div>
                            <div class="modal-body pt-2">
                                <p>Incoming Call from <span v-if="name">{{ name }}</span><span v-else>{{ callFrom | phone }}</span></p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-danger" @click="reject">Reject</button>
                                <button type="button" class="btn btn-success" @click="accept">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
    <div v-else-if="answeredCall">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Caller</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="callerName">Who is calling?</label>
                                    <input type="text" class="form-control" id="callerName" placeholder="Enter caller name or ID" v-model="name">
                                </div>
                                <div class="form-group">
                                    <label for="reason">Reason for call</label>
                                    <input type="text" class="form-control" id="reason" placeholder="Enter the reason for the call" v-model="reason">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat" v-if="manual" @click="cancel" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-info" @click="submit" :disabled="!canSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import {mapActions, mapMutations} from 'vuex'
    import Twilio from 'twilio-client'

    export default {
        computed: {
            canSubmit() {
                return this.name && this.name.length > 0 && this.reason && this.reason.length > 0
            }
        },

        data() {
            return {
                name: null,
                reason: null,
                newCall: false,
                callFrom: null,
                conn: null,
                answeredCall: false,
                manual: false,
            }
        },

        mounted() {
            this.$parent.$on('manual-call', () => {
                this.startCall(null)
                this.manual = true
                this.answeredCall = true
            })

            console.log('Requesting Capability Token...');
            axios.get('/token')
                .then((response) => {
                    return response.data
                })
                .then(token => {
                    console.log('Got a token.');
                    console.log('Token: ' + token);

                    // Setup Twilio.Device
                    Twilio.Device.setup(token);
                })

            Twilio.Device.ready(device => {
                console.log("Ready")
            });

            Twilio.Device.error(error => {
                console.log("ERROR: " + error.message)
            });

            Twilio.Device.connect(connection => {
                this.startCall(this.callFrom)
            });

            Twilio.Device.disconnect(connection => {
                this.endCall()
                this.answeredCall = false
            });

            Twilio.Device.cancel(connection => {
                this.newCall = false
                this.answeredCall = false
            });

            Twilio.Device.incoming(connection => {
                console.log('Incoming connection from ' + connection.parameters.From)
                this.callFrom = connection.parameters.From

                if (connection.parameters.From == "+447904860610") {
                    this.setName("Raymond Wilkinson")
                    this.name = "Raymond Wilkinson"
                }

                this.conn = connection
                this.newCall = true
            });
        },

        methods: {
            submit() {
                this.setName(this.name)

                this.name = null
                this.reason = null
                this.answeredCall = false
                this.manual = false
            },

            cancel() {
                this.name = null
                this.reason = null
                this.answeredCall = false
                this.manual = false
                this.endCall()
                this.setShowingCall(false)
            },

            accept() {
                this.newCall = false
                this.conn.accept()
                this.answeredCall = true
            },

            reject() {
                this.newCall = false
                this.conn.reject()
            },

            ...mapActions([
                'startCall',
                'endCall',
            ]),

            ...mapMutations([
                'setName',
                'setShowingCall',
            ])
        }
    }
</script>

<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
</style>