import Vue from 'vue'
import routes from './routes'
import Router from 'vue-router'
import NProgress from 'nprogress'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    routes: routes
})

router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start()
    }
    next()
})

router.afterEach((to, from) => {
    NProgress.done()
    $('#accountSubmenu').removeClass('show')
    $('a[href$="#accountSubmenu"]').attr("aria-expanded","false")
})

export default router