import Vue from 'vue'
import { parsePhoneNumber } from 'libphonenumber-js'

Vue.filter('phone', function (value) {
    if (!value) return ''

    let phoneNumber = parsePhoneNumber(value)
    return phoneNumber.formatInternational()
})