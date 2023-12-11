<?php
require_once("../admin/header.php");
require_once("../connectionclass.php");

$obj = new Connectionclass();
$username= $_SESSION['username'];
$sql="select st_id from staff where st_email='$username'";
  $staff_id= $obj->getSingleData($sql);
 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Module</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>Add


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $query = "SELECT * FROM course where c_id in(select fk_cid from staff_course where fk_stid=$staff_id)";
        $data = $obj->GetTable($query);
        //var_dump($data);
        

        ?>

        <div class="col-md-6">
        <form action="code/add_module_exe.php" method="post">
    <div class="form-group">
        <label for="cid">Subject</label>
        <select class="form-control" name="cid" id="cid" required>
            <option value="">Select any subject</option>
            <?php foreach ($data as $row) { ?>
                <option value="<?php echo $row['c_id'] ?>">
                    <?php echo $row['c_name'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="mname">Module Name</label>
        <input type="text" class="form-control" name="mname" id="mname" required>
    </div>
    <div class="form-group">
        <label for="mno">Module No</label>
        <input type="number" class="form-control" name="mno" id="mno" min="1" max="5" required>
    </div>
    <button type="submit" name="sub" class="btn btn-primary">ADD</button>
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
require_once("../admin/footer.php");
?>