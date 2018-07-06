import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'
import Wrapper from '../containers/Wrapper'

// Views
import Dashboard from '../views/Dashboard/Dashboard'
import RoleList from '../views/Role/list'
import RoleEdit from '../views/Role/edit'
import RoleCreate from '../views/Role/create'
import ProductSizeList from '../views/ProductSize/list'
import ProductSizeEdit from '../views/ProductSize/edit'
import ProductSizeCreate from '../views/ProductSize/create'
import CategoryList from '../views/Category/list'
import CategoryEdit from '../views/Category/edit'
import CategoryCreate from '../views/Category/create'

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
              name: 'List Role',
              component: RoleList
            },
            {
              path: 'edit/:id',
              name: 'Edit Role',
              component: RoleEdit
            },
            {
              path: 'create',
              name: 'Create Role',
              component: RoleCreate
            },
          ]
        },
        {
          path: 'productsize',
          redirect: 'productsize/list',
          name: 'Product Size',
          component: Wrapper,
          children: [
            {
              path: 'list',
              name: 'List Size',
              component: ProductSizeList
            },
            {
              path: 'edit/:id',
              name: 'Edit Size',
              component: ProductSizeEdit
            },
            {
              path: 'create',
              name: 'Create Size',
              component: ProductSizeCreate
            },
          ]
        },
        {
          path: 'category',
          redirect: 'category/list',
          name: 'Category',
          component: Wrapper,
          children: [
            {
              path: 'list',
              name: 'List Category',
              component: CategoryList
            },
            {
              path: 'edit/:id',
              name: 'Edit Category',
              component: CategoryEdit
            },
            {
              path: 'create',
              name: 'Create Category',
              component: CategoryCreate
            },
          ]
        }
      ]
    }
  ]
})
