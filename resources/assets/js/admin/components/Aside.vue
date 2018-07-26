<template>
  <aside class="aside-menu">
    <div class="aside-avatar">
      <div class="aside-avatar-border">
        <img class="avatar" src="http://s2.chacha.vn/albums/s1/1403/1403.jpg" alt="avatar">
        <div class="camera" ></div>
      </div>
      <h4><i>Ms. </i>Bảo Thy</h4>
    </div>
    <div class="aside-info">
      <ul class="nav-dropdown-items">
        <template v-for="(item, index) in nav">
          <li class="nav-item" :key="index">
            <router-link :to="item.url" class="nav-link">
              <i :class="item.icon"></i> {{item.name}}
              <!-- <b-badge v-if="item.badge && item.badge.text" :variant="item.badge.variant">{{item.badge.text}}</b-badge> -->
            </router-link>
        </li>
        </template>
      </ul>
    </div>
  </aside>
</template>

<script>
import nav from "../_nav";

export default {
  name: "c-aside",
  data() {
    return {
      nav: nav.nav_right.items
    };
  }
};
</script>
