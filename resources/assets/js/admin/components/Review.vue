<template>
    <div  class="show-list-item">
    <b-card>
        <div slot="header"><i class="fa fa-opencart" /> Review</div>
        <vue-good-table
          ref="role_table"
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
          :sort-options="{enabled: true, initialSortBy: {field: 'review', type: 'asc'}}"
          :search-options="{
            enabled: true,
          }">
          <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'action'" data-label="Action">
              <button type="submit" class="btn btn-warning" @click="edit(props.row.action)"><i class="fa fa-pencil"></i></button>&nbsp;
              <button type="submit" class="btn btn-danger" @click="del(props.row.action)"><i class="fa fa-trash"></i></button>
            </span>
            <span v-else :data-label="props.column.label">
              {{props.formattedRow[props.column.field]}}
            </span>
          </template>
        </vue-good-table>
    </b-card>
    </div>
</template>
<script>
import Axios from "axios";
export default {
  name: "c-review",
  data: () => ({
    columns: [
      {
        label: "User",
        field: "user_id",
        filterOptions: {
          enabled: true,
          trigger: "enter"
        }
      },
      {
        label: "Review",
        field: "review",
        filterOptions: {
          enabled: true,
          trigger: "enter"
        }
      },
      {
        label: "Action",
        field: "action",
        html: true
      }
    ],
    rows: []
  }),
  mounted() {},
  methods: {
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
