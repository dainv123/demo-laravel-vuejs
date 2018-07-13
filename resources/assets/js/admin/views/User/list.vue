<template>
  <div class="show-list-item">
    <b-col sm="12">
      <b-card>
        <div slot="header">
          <i class="fa fa-opencart" />
          List User
          <b-link class="float-right btn btn-primary" :to="{ name: 'Create User'}">Create</b-link>
        </div>
        <vue-good-table
          ref="user_table"
          @on-column-filter="onColumnFilter"
          @on-row-click="onColumnFilter"
          @on-sort-change="onSortChange"
          :columns="columns"
          :rows="rows"
          theme="black-rhino"
          :line-numbers="true"
          :pagination-options="{ enabled: true, perPage: 5}"
          :select-options="{enabled: false, selectOnCheckboxOnly: false,}"
          styleClass="vgt-table condensed"
          :sort-options="{enabled: true, initialSortBy: {field: 'title', type: 'asc'}}"
          :search-options="{
            enabled: true,
          }">
          <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'action'" data-label="Action">
              <button type="submit" class="btn btn-warning" @click="edit(props.row.action)"><i class="fa fa-pencil"></i></button>&nbsp;
              <button type="submit" class="btn btn-danger" @click="del(props.row.action)"><i class="fa fa-trash"></i></button>
            </span>
            <span v-else-if="(props.column.field == 'status' && props.row.status == 'active') || (props.column.field == 'subscribe' && props.row.subscribe == 'active')" :data-label="props.column.label">
              <span class="badge badge-success">{{props.row.status}}</span>
            </span>
            <span v-else-if="(props.column.field == 'status' && props.row.status == 'inactive') || (props.column.field == 'subscribe' && props.row.subscribe == 'inactive')" :data-label="props.column.label">
              <span class="badge badge-danger">{{props.row.status}}</span>
            </span>
            <span v-else :data-label="props.column.label">
              {{props.formattedRow[props.column.field]}}
            </span>
          </template>
        </vue-good-table>
      </b-card>
    </b-col>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  props: [],
  name: "user-list",
  data() {
    return {
      url: "",
      url_delete: "",
      columns: [
        {
          label: "Email",
          field: "email",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Name",
          field: "name",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Sex",
          field: "sex",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Birthday",
          field: "birthday",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Role",
          field: "role",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Status",
          field: "status",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Subscribe",
          field: "subscribe",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Created On",
          field: "created_at",
          type: "date",
          dateInputFormat: "YYYY-MM-DD",
          dateOutputFormat: "LLL"
        },
        {
          label: "Action",
          field: "action",
          html: true
        }
      ],
      rows: []
    };
  },
  mounted() {
    console.log(this)
    this.get_list();
  },
  methods: {
    get_list() {
      this.url = "/api/user";
      Axios.get(this.url)
        .then(response => {
          console.log("response", response.data.data);
          this.rows = response.data.data;
        })
        .catch(function(error) {
          console.error(error);
        });
    },
    edit(id){
    this.$router.push({ name: 'Edit User', params: { id: id } });
    },
    del(id) {
      swal({
        title: "Are you sure?",
        text: "Are you delete",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_delete = { id: id };
          this.url_delete = "/api/user/delete";
          console.log("url", this.url_delete, data_delete);
          Axios.post(this.url_delete, data_delete)
            .then(response => {
              if (response.data.status == true) {
                this.get_list();
                swal("Delete Success!", "Delete inpage success!", "success");
              } else swal("Oops!", "Delete Faild!", "error");
            })
            .catch(function(error) {
              swal("Oops!", "Delete Faild!", "error");
              e.preventDefault();
              console.error(error);
            });
        }
      });
    },
    toggleSelectRow(params) {
      console.log(params.row, params.pageIndex, params.selected);
    },
    selectCell(params) {
      console.log("select cell called");
      console.log(params);
    },
    searchedRow(params) {
      console.log(params);
    },
    autofilter(type) {
      if (type === "title") {
        this.columns[0].filterOptions.filterValue = "John";
      }
      if (type === "reset") {
        this.columns[0].filterOptions.filterValue = "";
        this.columns[1].filterOptions.filterValue = "";
        // this.columns[1].filterOptions.filterValue = null;
      }
    },

    sortFn(x, y, col) {
      if (x < y) {
        return -1;
      }
      if (x > y) {
        return 1;
      }
      return 0;
    },
    formatAge(value) {
      return `lala${value}lala`;
    },
    addFilter() {
      this.$set(this.columns[2], "filterValue", "Jane");
      console.log(this.columns);
    },

    onPerPageChange(evt) {
      // { currentPage: 1, currentPerPage: 10, total: 5 }
      console.log("per-page-changed:");
      console.log(evt);
    },

    onPageChange(evt) {
      // { currentPage: 1, currentPerPage: 10, total: 5 }
      console.log("page-changed:");
      console.log(evt);
    },

    onColumnFilter(params) {
      // { currentPage: 1, currentPerPage: 10, total: 5 }
      console.log("on-column-filters:");
      console.log(params);
    },

    onSearch(params) {
      console.log("on-search:");
      console.log(params);
    },

    onSortChange(params) {
      console.log("on-sort-change:");
      console.log(params);
    },

    onRowClick(params) {
      console.log("on-row-click");
      console.log(params);
    }
  }
};
</script>


