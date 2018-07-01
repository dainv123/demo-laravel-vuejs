import Vue from 'vue'
import Router from 'vue-router'
import VueGoodTable from 'vue-good-table'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard/Dashboard'
import Role from '../views/Role/list'

Vue.use(VueGoodTable)
Vue.use(Router)

export default new Router({
  mode: 'hash',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: Full,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: 'role',
          name: 'Role',
          component: Role
        }
      ]
    }
  ]
})
