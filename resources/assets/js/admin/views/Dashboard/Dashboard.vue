<template>
  <div class="show-item">
    <p class="text-info">Hello  1</p>
    <div class="panel panel-default">
      <div class="panel-heading">
          DataTables Advanced Tables
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="odd gradeX">
                      <td>Trident</td>
                      <td>Internet Explorer 4.0</td>
                      <td>Win 95+</td>
                      <td class="center">4</td>
                      <td class="center">X</td>
                  </tr>
              </tbody>
          </table>
      </div>
    </div>
  </div>
</template>

<script>
$(document).ready(function() {
  $("#myTable").DataTable();
});
export default {
  name: "dashboard"
};
</script>
