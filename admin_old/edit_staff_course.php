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
          <h1>Edit Staff Course</h1>
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


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");

        $stcid = $_GET["stcid"];

        $obj = new Connectionclass();

        // $query = "SELECT * FROM staff_subject WHERE staff_subject_id = $ssid";
        // $data = $obj->GetSingleRow($query);
        //var_dump($data);
        
        // $query = "SELECT * FROM staff";
        // $data1 = $obj->GetTable($query);
        //var_dump($data2);
        
        $query = "SELECT * FROM course";
        $data = $obj->GetTable($query);
        //var_dump($data3);
        

        ?>



        <div class="col-md-6">
          <form action="code/update_staff_course_exe.php" method="post">

            <div class="form-group">
              <label for="">Course:</label><br>

              <?php foreach ($data as $row) { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cid" value="<?php echo $row["c_id"] ?>"
                    id="<?php echo $row["c_id"] ?>">
                  <label class="form-check-label" for="<?php echo $row["c_id"] ?>">
                    <?php echo $row["c_name"]; ?>
                  </label>
                </div>
              <?php } ?>

            </div>


            <input type="hidden" name="stcid" value="<?php echo $stcid ?>">
            <button type="submit" name="sub" class="btn btn-primary">UPDATE</button>
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