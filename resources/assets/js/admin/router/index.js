import Vue from "vue";
import Router from "vue-router";

// Containers
import Full from "../containers/Full";
import Wrapper from "../containers/Wrapper";

// Views
import Dashboard from "../views/Dashboard/Dashboard";
import RoleList from "../views/Role/list";
import RoleEdit from "../views/Role/edit";
import RoleCreate from "../views/Role/create";
import PermissionList from "../views/Permission/list";
import PermissionEdit from "../views/Permission/edit";
import PermissionCreate from "../views/Permission/create";
import ProductSizeList from "../views/ProductSize/list";
import ProductSizeEdit from "../views/ProductSize/edit";
import ProductSizeCreate from "../views/ProductSize/create";
import CategoryList from "../views/Category/list";
import CategoryEdit from "../views/Category/edit";
import CategoryCreate from "../views/Category/create";
import UserList from "../views/User/list";
import UserEdit from "../views/User/edit";
import UserCreate from "../views/User/create";
import ProductList from "../views/Product/list";
import ProductEdit from "../views/Product/edit";
import ProductCreate from "../views/Product/create";
import BlogList from "../views/Blog/list";
import BlogEdit from "../views/Blog/edit";
import BlogCreate from "../views/Blog/create";
import SliderList from "../views/Slider/list";
import SliderEdit from "../views/Slider/edit";
import SliderCreate from "../views/Slider/create";
import ProfileRead from "../views/Profile/profile";
import ProfileEdit from "../views/Profile/setting";
import ProfileNotification from "../views/Profile/notification";

Vue.use(Router);

export default new Router({
  mode: "hash",
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: "",
      redirect: "/dashboard",
      name: "Home",
      component: Full,
      children: [
        {
          path: "dashboard",
          name: "Dashboard",
          component: Dashboard
        },
        {
          path: "role",
          redirect: "/role/list",
          name: "Role",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Role",
              component: RoleList
            },
            {
              path: "edit/:id",
              name: "Edit Role",
              component: RoleEdit
            },
            {
              path: "create",
              name: "Create Role",
              component: RoleCreate
            }
          ]
        },
        {
          path: "permission",
          redirect: "/permission/list",
          name: "Permission",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Permission",
              component: PermissionList
            },
            {
              path: "edit/:id",
              name: "Edit Permission",
              component: PermissionEdit
            },
            {
              path: "create",
              name: "Create Permission",
              component: PermissionCreate
            }
          ]
        },
        {
          path: "productsize",
          redirect: "/productsize/list",
          name: "Product Size",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Size",
              component: ProductSizeList
            },
            {
              path: "edit/:id",
              name: "Edit Size",
              component: ProductSizeEdit
            },
            {
              path: "create",
              name: "Create Size",
              component: ProductSizeCreate
            }
          ]
        },
        {
          path: "category",
          redirect: "/category/list",
          name: "Category",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Category",
              component: CategoryList
            },
            {
              path: "edit/:id",
              name: "Edit Category",
              component: CategoryEdit
            },
            {
              path: "create",
              name: "Create Category",
              component: CategoryCreate
            }
          ]
        },
        {
          path: "user",
          redirect: "/user/list",
          name: "User",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List User",
              component: UserList
            },
            {
              path: "edit/:id",
              name: "Edit User",
              component: UserEdit
            },
            {
              path: "create",
              name: "Create User",
              component: UserCreate
            }
          ]
        },
        {
          path: "product",
          redirect: "/product/list",
          name: "Product",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Product",
              component: ProductList
            },
            {
              path: "edit/:id",
              name: "Edit Product",
              component: ProductEdit
            },
            {
              path: "create",
              name: "Create Product",
              component: ProductCreate
            }
          ]
        },
        {
          path: "blog",
          redirect: "/blog/list",
          name: "Blog",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Blog",
              component: BlogList
            },
            {
              path: "edit/:id",
              name: "Edit Blog",
              component: BlogEdit
            },
            {
              path: "create",
              name: "Create Blog",
              component: BlogCreate
            }
          ]
        },
        {
          path: "slider",
          redirect: "/slider/list",
          name: "Slider",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "list",
              name: "List Slider",
              component: SliderList
            },
            {
              path: "edit/:id",
              name: "Edit Slider",
              component: SliderEdit
            },
            {
              path: "create",
              name: "Create Slider",
              component: SliderCreate
            }
          ]
        },
        {
          path: "profile",
          redirect: "/profile/",
          name: "Profile",
          component: { render(c) { return c('router-view') } },
          children: [
            {
              path: "/",
              name: "Read Profile",
              component: ProfileRead
            },
            {
              path: "edit",
              name: "Edit Profile",
              component: ProfileEdit
            },
            {
              path: "notification",
              name: "Notification Profile",
              component: ProfileNotification
            }
          ]
        }
      ]
    }
  ]
});
