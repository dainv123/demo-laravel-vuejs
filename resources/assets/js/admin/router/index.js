import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard'
// import Dashboard1 from '../views/Dashboard1'
// import Dashboard2 from '../views/Dashboard2'

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
        // {
        //   path: 'dashboard1',
        //   name: 'Dashboard1',
        //   component: Dashboard1
        // },
        // {
        //   path: 'dashboard2',
        //   name: 'Dashboard2',
        //   component: Dashboard2
        // }
      ]
    }
  ]
})
