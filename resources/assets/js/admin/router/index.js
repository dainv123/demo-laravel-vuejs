import Vue from 'vue'
import Router from 'vue-router'
import VueGoodTable from 'vue-good-table'

// Containers
import Full from '../containers/Full'
import Wrapper from '../containers/Wrapper'

// Views
import Dashboard from '../views/Dashboard/Dashboard'
import RoleList from '../views/Role/list'
import RoleEdit from '../views/Role/edit'
import RoleCreate from '../views/Role/create'

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
          redirect: 'role/list',
          name: 'Role',
          component: Wrapper,
          children: [
            {
              path: 'list',
              name: 'List',
              component: RoleList
            },
            {
              path: 'edit',
              name: 'Edit',
              component: RoleEdit
            },
            {
              path: 'create',
              name: 'Create',
              component: RoleCreate
            },
          ]
        }
      ]
    }
  ]
})
