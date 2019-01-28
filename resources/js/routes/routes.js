import Home from '../components/Home/Home'
import Calls from '../components/Calls/Calls'
import Problems from '../components/Problems/Problems'

export default [
    {
        path: '/problems',
        component: Problems,
        name: 'problems',
    },
    {
        path: '/calls',
        component: Calls,
        name: 'calls',
    },
    {
        path: '/',
        component: Home,
        name: 'home',
    }
]