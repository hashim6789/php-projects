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
          <h1>Add Mark Pattern</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add</h3>
        <a class="btn btn-sm btn-success float-right p-2" href='show_mark_pattern.php'>BACK</a>


      </div>
      <div class="card-body">


        <?php
        

        $query = "SELECT * FROM course where c_id in(select fk_cid from staff_course where fk_stid=$staff_id)";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        

        ?>
        <div class="col-md-6">
        <form action="code/add_mark_pattern_exe.php" method="post">
    <div class="form-group">
        <label for="cid">Course</label><br>
        <select class="form-control" name="cid" id="cid" required>
            <option value="">Select a Course</option>
            <?php foreach ($data1 as $row) { ?>
                <option value="<?php echo $row["c_id"]; ?>">
                    <?php echo $row["c_name"]; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="part">Pattern Title</label>
        <select name="part" id="part" class="form-control" required>
            <option value="">Select any title</option>
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
        <label for="mark">Mark</label>
        <select name="mark" id="mark" class="form-control" required>
            <option value="">Select mark</option>
            <option value="2"> 2 - MARK </option>
            <option value="5"> 5 - MARK</option>
            <option value="15">15- MARK</option>
        </select>
    </div>

    <div class="form-group">
        <label for="order">Order</label>
        <input type="number" min="1" max="8" name="order" class="form-control" required>
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