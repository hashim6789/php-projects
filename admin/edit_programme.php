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
          <h1>Edit Programme</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit </h3>


      </div>
      <div class="card-body">


        <?php
        require_once("header.php");
        ?>

        <?php
        require_once("../connectionclass.php");

        $pid = $_GET["pid"];

        $obj = new Connectionclass();

        $query = "SELECT * FROM programme WHERE p_id = $pid";
        $data = $obj->GetSingleRow($query);

        //var_dump($data);
        
        ?>
        <div class="col-md-6">
    <form action="./code/update_programme_exe.php" method="post">
        <div class="form-group">
            <label for="pname">Programme Name :</label>
            <input type="text" name="pname" class="form-control" value="<?php echo $data["p_name"] ?>" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="pid" value="<?php echo $pid ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary float-right" name="submit">UPDATE</button>
    </form>
</div>




      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once("footer.php");
?>