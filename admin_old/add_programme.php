<?php
require_once("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Programme</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add </h3>


      </div>
      <div class="card-body">


        <div class="col-md-6">
          <form action="./code/add_programme_exe.php" method="post">
            <div class="form-group">
              <label for="">Programme Name :</label>
              <input type="text" name="pname" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary float-right" name="submit">SAVE</button>
          </form>
        </div>

      </div>
      <!-- /.card-body -->

      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->






<?php
require_once("footer.php");
?>