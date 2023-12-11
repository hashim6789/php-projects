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
          <h1>Add Course</h1>
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


        <?php
        require_once("../connectionclass.php");
        $query = "SELECT * FROM programme";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>
        <div class="col-md-6">
        <form action="./code/add_course_exe.php" method="post">
    <div class="form-group">
        <label for="pid">Programme:</label>
        <select name="pid" id="pid" class="form-control" required>
            <option value="">Select any programme</option>
            <?php foreach ($data as $row) { ?>
                <option value="<?php echo $row["p_id"]; ?>">
                    <?php echo $row["p_name"]; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="cname">Course:</label>
        <input type="text" name="cname" id="cname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="ccode">Course Code:</label>
        <input type="text" name="ccode" id="ccode" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="semester">Semester:</label>
        <select name="sem" id="semester" class="form-control" required>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">ADD</button>
</form>



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