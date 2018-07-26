const nav_left = {
  items: [
    {
      name: 'Dashboard',
      url: '/dashboard',
      icon: 'icon-home'
    },
    {
      name: 'Authentication',
      icon: 'icon-people',
      children: [
        {
          name: 'User',
          url: '/user',
          icon: 'icon-user'
        },
        {
          name: 'Role',
          url: '/role',
          icon: 'icon-user-follow',
          badge: {
            variant: 'success',
            text: 'NEW'
          }
        },
        {
          name: 'Permission',
          url: '/permission',
          icon: 'icon-user-unfollow',
          badge: {
            variant: 'success',
            text: 'NEW'
          }
        }
      ]
    },
    {
      name: 'Manager',
      icon: 'icon-people',
      children: [
        {
          name: 'Category',
          url: '/category',
          icon: 'icon-list'
        },
        {
          name: 'Product',
          url: '/product',
          icon: 'icon-basket-loaded'
        },
        {
          name: 'Blog',
          url: '/blog',
          icon: 'icon-note'
        },
        {
          name: 'Size',
          url: '/productsize',
          icon: 'icon-cursor-move'
        },
        {
          name: 'Slider',
          url: '/slider',
          icon: 'icon-calculator'
        }
      ]
    }
  ]
}
const nav_right = {
  items: [
    {
      name: 'Home',
      url: '/',
      icon: 'icon-home'
    },
    {
      name: 'Profile',
      url: '/profile/',
      icon: 'icon-user'
    },
    {
      name: 'Notification',
      url: '/profile/notification',
      icon: 'icon-bell'
    },
    {
      name: 'Setting',
      url: '/profile/edit',
      icon: 'icon-speedometer'
    },
    {
      name: 'Logout',
      url: '/logout',
      icon: 'icon-logout'
    }
  ]
}

export default { nav_left, nav_right };
