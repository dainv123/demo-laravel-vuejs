import Vue from 'vue'
import Router from 'vue-router'
import Datatable from 'vue2-datatable-component'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard/Dashboard'
import Role from '../views/Role/list'

Vue.use(Datatable)
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
