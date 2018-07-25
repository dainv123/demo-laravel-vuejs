<template>
  <div v-if="isExternalLink">
    <a :href="url" :class="classList" @click.native="handleClick">
      <i :class="icon"></i> {{name}}
      <b-badge v-if="badge && badge.text" :variant="badge.variant">{{badge.text}}</b-badge>
    </a>
  </div>
  <div v-else>
    <router-link :to="url" :class="classList" @click.native="handleClick">
      <i :class="icon"></i> {{name}}
      <b-badge v-if="badge && badge.text" :variant="badge.variant">{{badge.text}}</b-badge>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'sidebar-nav-link',
  props: {
    name: {
      type: String,
      default: ''
    },
    url: {
      type: String,
      default: ''
    },
    icon: {
      type: String,
      default: ''
    },
    badge: {
      type: Object,
      default: () => {}
    },
    variant: {
      type: String,
      default: ''
    },
    classes: {
      type: String,
      default: ''
    }
  },
  computed: {
    classList () {
      return [
        'nav-link',
        this.linkVariant,
        ...this.itemClasses
      ]
    },
    linkVariant () {
      return this.variant ? `nav-link-${this.variant}` : ''
    },
    itemClasses () {
      return this.classes ? this.classes.split(' ') : []
    },
    isExternalLink () {
      if (this.url.substring(0, 4) === 'http') {
        return true
      } else {
        return false
      }
    }
  },
  methods: {
    /**
     * FIX NAV ACTIVE ITEMS
     */
    handleClick(e) {
      var arrayActive = document.querySelectorAll('.nav-item .open.active');
      var nodeThis = this.$el.children[0];
      var isThis = Array.from(arrayActive).indexOf(nodeThis);
      if(isThis === -1) {
        arrayActive.forEach(element => {
          element.classList.remove("open","active");
        });
        nodeThis.classList.add("open","active");
      }
    }
  }
}
</script>
