export default {
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
