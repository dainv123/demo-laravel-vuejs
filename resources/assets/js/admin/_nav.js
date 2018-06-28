export default {
  items: [
    {
      name: 'Dashboard',
      url: 'dashboard',
      icon: 'icon-speedometer'
    },
    {
      name: 'Authentication',
      icon: 'icon-speedometer',
      children: [
        {
          name: 'User',
          url: 'user',
          icon: 'icon-bell'
        },
        {
          name: 'Role',
          url: 'role',
          icon: 'icon-star',
          badge: {
            variant: 'success',
            text: 'NEW'
          }
        },
        {
          name: 'Permission',
          url: 'permission',
          icon: 'icon-star',
          badge: {
            variant: 'secondary',
            text: '4.7'
          }
        }
      ]
    },
    {
      name: 'Content',
      icon: 'icon-bell',
      children: [
        {
          name: 'Blog',
          icon: 'icon-bell',
          children: [
            {
              name: 'Blog',
              url: 'blog',
              icon: 'icon-bell'    
            },
            {
              name: 'Review',
              url: 'blogreview',
              icon: 'icon-bell'    
            },
            {
              name: 'Raiting',
              url: 'blograiting',
              icon: 'icon-bell'    
            }
          ]
        },
        {
          name: 'Category',
          url: 'category',
          icon: 'icon-bell'
        },
        {
          name: 'Product',
          icon: 'icon-bell',
          children: [
            {
              name: 'Product',
              url: 'product',
              icon: 'icon-bell'    
            },
            {
              name: 'Review',
              url: 'productreview',
              icon: 'icon-bell'    
            },
            {
              name: 'Raiting',
              url: 'productraiting',
              icon: 'icon-bell'    
            },
            {
              name: 'Image',
              url: 'productimage',
              icon: 'icon-bell'    
            }
          ]
        },
        {
          name: 'Size',
          url: 'productsize',
          icon: 'icon-bell'
        },
        {
          name: 'Slider',
          url: 'slider',
          icon: 'icon-bell'
        }
      ]
    }
  ]
}
