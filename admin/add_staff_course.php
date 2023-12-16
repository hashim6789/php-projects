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
          <h1>Add Staff Course</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add </h3>
        <a class="btn btn-sm btn-success float-right" href='show_staff_course.php'>BACK</a>


      </div>
      <div class="card-body">

        <?php
        require_once("../connectionclass.php");

        $obj = new Connectionclass();

        $query = "SELECT * FROM staff";
        $data1 = $obj->GetTable($query);
        //var_dump($data);
        
        $query = "SELECT * FROM course";
        $data2 = $obj->GetTable($query);
        //var_dump($data2);
        

        ?>
        <div class="col-md-6">
        <form action="code/add_staff_course_exe.php" method="post">
    <div class="form-group">
        <label for="stid">Select Staff:</label>
        <select class="form-control" name="stid" id="stid" required>
            <option value="">Select a staff</option>
            <?php foreach ($data1 as $row) { ?>
                <option value="<?php echo $row["st_id"]; ?>">
                    <?php echo $row["st_name"]; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Select Courses :</label><br>

        <?php foreach ($data2 as $row) { ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cid[]" value="<?php echo $row["c_id"] ?>"
                    id="<?php echo $row["c_id"] ?>">
                <label class="form-check-label" for="<?php echo $row["c_id"] ?>">
                    <?php echo $row["c_name"]; ?>
                </label>
            </div>
        <?php } ?>

    </div>

    <button type="submit" name="sub" class="btn btn-primary" onclick="return validateForm()">ADD</button>
</form>

<script>
    function validateForm() {
        var staffSelection = document.getElementById("stid");
        var checkboxes = document.querySelectorAll('input[name="cid[]"]:checked');

        if (staffSelection.value === "") {
            alert("Please select a staff.");
            return false;
        }

        if (checkboxes.length === 0) {
            alert("Please select at least one course.");
            return false;
        }

        return true;
    }
</script>

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