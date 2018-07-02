<template>
  <div class="show-list-item">
    <b-col sm="12">
      <b-card>
        <div slot="header">
            List Role
            <b-link class="float-right btn btn-primary" :to="'home'">Create</b-link>
        </div>
        <vue-good-table
          ref="my-table"
          @on-column-filter="onColumnFilter"
          @on-row-click="onColumnFilter"
        
          @on-sort-change="onSortChange"
          :columns="columns"
          :rows="rows"
          theme="black-rhino"
          :line-numbers="true"
          :pagination-options="{ enabled: true, perPage: 5}"
          :select-options="{
            enabled: false,
            selectOnCheckboxOnly: false,
          }"
          styleClass="vgt-table condensed"
          :sort-options="{enabled: true, initialSortBy: {field: 'title', type: 'asc'}}"
          :search-options="{
            enabled: true,
          }">

          <!-- <template slot="table-row" slot-scope="rows">
            <div>
              <td>{{rows.row.name}}</td>
            </div>
          </template> -->
        </vue-good-table>
      </b-card>
    </b-col>
  </div>
</template>

<script>
// import GroupedTable from './grouped-table';

export default {
  props: [],
  name: "dashboard",
  data() {
    return {
      // searchTerm: "",
      columns: [
        {
          label: "Title",
          field: "title",
          filterOptions: {
            enabled: true,
            trigger: "enter"
          }
        },
        {
          label: "Created On",
          field: "createdAt",
          type: "date",
          dateInputFormat: "YYYY-MM-DD",
          dateOutputFormat: "LLL"
        },
        {
          label: "Action",
          field: "action",
          html: true,
        }
      ],
      rows: [
        {
          id: 1,
          title: "John",
          createdAt: "2018-02-18T00:00:43-05:00",
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        },
        {
          id: 2,
          title: "Jane",
          createdAt: "2011-10-31",
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        },
        {
          id: 3,
          title: "Susan",
          createdAt: "2011-10-30",
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        },
        {
          id: 4,
          title: "Chris",
          createdAt: "2011-10-11",
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        },
        {
          id: 5,
          title: "Dan",
          createdAt: null,
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        },
        {
          id: 6,
          title: "Dan",
          createdAt: null,
          action: '<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
        }
      ]
    };
  },
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


