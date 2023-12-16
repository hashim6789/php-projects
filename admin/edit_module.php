<?php
require_once("../admin/header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Module</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit</h3>
        <a class="btn btn-sm btn-success float-right" href='show_module.php'>BACK</a>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $cmid = $_GET["cmid"];

        $query = "SELECT * FROM course";
        $data = $obj->GetTable($query);
        //var_dump($data);
        
        $query = "SELECT * FROM course_module cm JOIN course c ON (c.c_id=cm.fk_cid) WHERE mod_id=$cmid";
        $data1 = $obj->GetSingleRow($query);
        //var_dump($data1);
        
        ?>

<div class="col-md-6">
    <form action="code/update_module_exe.php" method="post">
        <div class="form-group">
            <label for="cid">Course</label>
            <select class="form-control" name="cid" id="cid" required>
                <option value="<?php echo $data1['c_id'] ?>">
                    <?php echo $data1['c_name'] ?>
                </option>
                <?php foreach ($data as $row) { ?>
                    <option value="<?php echo $row['c_id'] ?>">
                        <?php echo $row['c_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mname">Module Name</label>
            <input type="text" class="form-control" name="mname" id="mname" value="<?php echo $data1['mod_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="mno">Module No</label>
            <input type="number" class="form-control" name="mno" id="mno" min="1" max="5" value="<?php echo $data1['mod_no'] ?>" required>
        </div>
        <button type="submit" name="sub" class="btn btn-primary">UPDATE</button>
        <input type="hidden" name="cmid" value="<?php echo $cmid ?>">
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