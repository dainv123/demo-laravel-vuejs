<template>
  <router-link v-if="this.permission === true" tag="li" class="nav-item nav-dropdown" :to="url" disabled>
    <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i :class="icon"></i> {{name}}</div>
    <ul class="nav-dropdown-items">
      <slot></slot>
    </ul>
  </router-link>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: ""
    },
    url: {
      type: String,
      default: ""
    },
    icon: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      permission: false
    };
  },
  mounted() {
      this.checkPermission();
  },
  methods: {
    handleClick(e) {
      e.preventDefault();
      e.target.parentElement.classList.toggle("open");
    },
    checkPermission(){
      var g_permission = JSON.parse(localStorage.getItem('g_permission')), obj_g_permission = JSON.parse(g_permission);
      this.permission = obj_g_permission;

      if(this.name === 'Authentication' && obj_g_permission.find(item => item.name === 'view-auth') != undefined
        ||this.name === 'Manager' && obj_g_permission.find(item => item.name === 'view-manager') != undefined
      )
      this.permission = true;  
    }
  }
};
</script>
