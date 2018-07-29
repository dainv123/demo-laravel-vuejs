// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.

require("../bootstrap");

import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import App from "./App";
import router from "./router";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import VueGoodTable from "vue-good-table";
import VeeValidate from "vee-validate";
import "beautify-scrollbar/dist/index.css";
import "v2-table/dist/index.css";
import V2Table from "v2-table";
import Axios from "axios";

Vue.prototype.$appName = 'My App'
// Axios.defaults.headers.common['Authorization'] = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjEwMGMyYTQ5NTgxMmM0MzM3MjFmYTVkMjVhOThlODZiOGUwODA3ZjQ2Nzc2MWI0ZmQ2NWY1NDYyOWQwOWQ5ZjViMTY1NDdiYTYwZDMzMjFmIn0.eyJhdWQiOiI4IiwianRpIjoiMTAwYzJhNDk1ODEyYzQzMzcyMWZhNWQyNWE5OGU4NmI4ZTA4MDdmNDY3NzYxYjRmZDY1ZjU0NjI5ZDA5ZDlmNWIxNjU0N2JhNjBkMzMyMWYiLCJpYXQiOjE1MzI4NjQxMDQsIm5iZiI6MTUzMjg2NDEwNCwiZXhwIjoxNTY0NDAwMTAzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.WSzGLIdsAF5UPJAbd34Bhige66M0jvgAyYeLubLwNZdyNw0RMRicr0T0V1u_R_ABuuFwX8EnTnXprw9N4yVg-PBm9h6pN3p2unIjQxe-DvoKg8fFEvtkYYesAmcJIm0i4HT6ivfTpo31SQQ_XGIWBttmEth0J8yDBGrBUKXdlJWJmKSZQpMaiC1bItTg-ZSYvJ4GcT0T6rSa6nEJHbBJ4k2x4MyF22gyJSnLdfjGineVi1pkCHmstQiSsil7BGu9Q0lhSrNSeKVSuUSigMP3V-wpiRiWVqqNSkf0UDs0y_D7M_bBkmVlO0kJZVlJnbZdgh_VNeVEW4sNcwMyaAZFP8EapNOBCEvIaDyW8LI4YXS7iCmLCQNRgdp_bjp_VjdRN7J_5XRDBVSSR4mDUabE4VoBJXVhkQx5a8QhxfhRSHl-BD7kvzK54aQAZios-FVeq7RAh08aDbfPLnUVTdM0kqua2TRFOAB18zPJal_Y3YDgxVvUuXdqJssc4TWsZfrx3iKdydzeY43S63zb5OCj6-UoCjgBF5zHjA8Ti5L6vK-ED9uvW-8E91FMSmyscsPYj6uvI4qsDJtGO9xG94grY7kC2pRdBQbSswXNh4a2ztAkTZFN4HRcJa3sMYU3v13KwmbirgEy7EjXCB9lo90LR88WFtXBpL-4XXb_agWYF94";

Vue.use(VueQuillEditor);
Vue.use(VeeValidate);
Vue.use(VueGoodTable);
Vue.use(BootstrapVue);
Vue.use(V2Table);


/* eslint-disable no-new */
new Vue({
  el: "#app",
  router,
  template: "<App/>",
  components: {
    App
  }
});
