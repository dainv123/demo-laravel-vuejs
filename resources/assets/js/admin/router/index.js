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
import PermissionList from '../views/Permission/list'
import PermissionEdit from '../views/Permission/edit'
import PermissionCreate from '../views/Permission/create'
import ProductSizeList from '../views/ProductSize/list'
import ProductSizeEdit from '../views/ProductSize/edit'
import ProductSizeCreate from '../views/ProductSize/create'
import CategoryList from '../views/Category/list'
import CategoryEdit from '../views/Category/edit'
import CategoryCreate from '../views/Category/create'
import UserList from '../views/User/list'
import UserEdit from '../views/User/edit'
import UserCreate from '../views/User/create'

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
          path: 'permission',
          redirect: 'permission/list',
          name: 'Permission',
          component: Wrapper,
          children: [
            {
              path: 'list',
              name: 'List Permission',
              component: PermissionList
            },
            {
              path: 'edit/:id',
              name: 'Edit Permission',
              component: PermissionEdit
            },
            {
              path: 'create',
              name: 'Create Permission',
              component: PermissionCreate
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
        },
        {
          path: 'user',
          redirect: 'user/list',
          name: 'User',
          component: Wrapper,
          children: [
            {
              path: 'list',
              name: 'List User',
              component: UserList
            },
            {
              path: 'edit/:id',
              name: 'Edit User',
              component: UserEdit
            },
            {
              path: 'create',
              name: 'Create User',
              component: UserCreate
            },
          ]
        }
      ]
    }
  ]
})
