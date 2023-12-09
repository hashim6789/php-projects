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
          <h1>Edit Mark Pattern</h1>
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
        $obj = new Connectionclass();

        $mpid = $_GET["mpid"];

        $query = "SELECT * FROM course";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM mark_pattern mp JOIN course c ON (mp.fk_cid=c.c_id) WHERE mpat_id = $mpid";
        $data2 = $obj->GetSingleRow($query);
        //var_dump($data2);
        

        ?>
        <div class="col-md-6">
          <form action="code/update_mark_pattern_exe.php" method="post">
            <div class="form-group">
              <label for="cid">Course</label><br>
              <select class="form-control" name="cid" id="cid">
                <option value="<?php echo $data2["fk_cid"] ?>">
                  <?php echo $data2['c_name'] ?>
                </option>
                <?php foreach ($data1 as $row) { ?>
                  <option value="<?php echo $row["c_id"]; ?>">
                    <?php echo $row["c_name"]; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Pattern Title</label>
              <select name="part" id="" class="form-control">
                <option value="<?php echo $data2["part"] ?>">
                  <?php echo "PART " . $data2['part'] ?>
                </option>
                <option value="A">PART A</option>
                <option value="B">PART B</option>
                <option value="C">PART C</option>
                <option value="D">PART D</option>
                <option value="E">PART E</option>
                <option value="F">PART F</option>
                <option value="G">PART G</option>
                <option value="H">PART H</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Mark</label>
              <select name="mark" id="" class="form-control">
                <option value="<?php echo $data2["mark"] ?>">
                  <?php echo $data2['mark'] . " - MARK" ?>
                </option>
                <option value="2"> 2 - MARK </option>
                <option value="5"> 5 - MARK</option>
                <option value="15">15- MARK</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Order</label>
              <input type="number" name="order" class="form-control" value="<?php echo $data2["m_order"] ?>">
            </div>
            <input type="hidden" name="mpid" value="<?php echo $mpid ?>">
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
require_once("../admin/footer.php");
?>