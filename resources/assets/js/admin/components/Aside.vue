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
        <li class="nav-item active">
          <div>
            <a href="#/blog" class="nav-link">
              <i class="icon-home"></i> Home
            </a>
        </div>
      </li>
      <li class="nav-item">
        <div>
          <a href="#/blogreview" class="nav-link">
            <i class="icon-user"></i> Profile
          </a>
        </div>
      </li>
      <li class="nav-item">
          <div>
            <a href="#/blog" class="nav-link">
              <i class="icon-bell"></i> Notification
            </a>
        </div>
      </li>
      <li class="nav-item">
        <div>
          <a href="#/blogreview" class="nav-link">
            <i class="icon-speedometer"></i> Setting
          </a>
        </div>
      </li>
      <li class="nav-item">
        <div>
          <a href="#/blogreview" class="nav-link">
            <i class="icon-logout"></i> Logout
          </a>
        </div>
      </li>
    </ul>
    </div>
  </aside>
</template>

<script>
export default {
  name: "c-aside"
};
</script>
