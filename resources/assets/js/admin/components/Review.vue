<template>
    <div  class="show-list-review">
    <b-card>
        <div slot="header"><i class="fa fa-street-view" /> Review</div>
        <v2-table :data="list" border height="300">
          <v2-table-column label="User" prop="user"></v2-table-column>
          <v2-table-column label="Review" prop="review"></v2-table-column>
          <v2-table-column label="Create On" prop="create_at"></v2-table-column>  
        </v2-table>  
    </b-card>
    </div>
</template>
<script>
import Axios from "axios";
export default {
  name: "c-review",
  data: () => ({
    list: [
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      },
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      },
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      },
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      },
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      },
      {
        user: "Shenzhen,China",
        review:
          "Node.js là một mã nguồn mở, một môi trường cho các máy chủ và ứng dụng mạng",
        create_at: "2017-12-02"
      }
    ]
  }),
  mounted() {},
  methods: {}
};
</script>
