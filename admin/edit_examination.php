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
          <h1>Edit Examination</h1>
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

        $exid = $_GET["exid"];
        $query = "SELECT * FROM examination e JOIN programme p ON (p.p_id=e.fk_pid) WHERE ex_id=$exid";
        $data1 = $obj->GetSingleRow($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM programme ";
        $data2 = $obj->GetTable($query);


        ?>
        <div class="col-md-6">
    <form action="code/update_examination_exe.php" method="post">
        <div class="form-group">
            <label for="title">Exam Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $data1["ex_title"]; ?>" required>
        </div>

        <div class="form-group">
            <label for="pid">Program</label><br>
            <select class="form-control" name="pid" id="pid" required>
                <option value="<?php echo $data1["p_id"]; ?>">
                    <?php echo $data1["p_name"]; ?>
                </option>
                <?php foreach ($data2 as $row) { ?>
                    <option value="<?php echo $row["p_id"]; ?>">
                        <?php echo $row["p_name"]; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year & Month</label>
            <input type="text" name="year" class="form-control" value="<?php echo $data1["ex_year"]; ?>" required>
        </div>

        <div class="form-group">
            <label for="sem">Semester:</label>
            <select name="sem" id="sem" class="form-control" required>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
            </select>
        </div>

        <input type="hidden" name="exid" value="<?php echo $exid ?>">
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