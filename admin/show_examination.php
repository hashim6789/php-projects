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
          <h1>Available Examinations</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Examinations</h3>
        <a class="btn btn-sm btn-primary float-right" href="add_examination.php">ADD</a>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $query = "SELECT * FROM examination e JOIN programme p ON (e.fk_pid=p.p_id)";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <table class="table table-bordered">
        <tr>
    <th class="text-center text-uppercase">ID</th>
    <th class="text-center text-uppercase">Exam Title</th>
    <th class="text-center text-uppercase">Programme</th>
    <th class="text-center text-uppercase">SEMESTER</th>
    <th class="text-center text-uppercase">year</th>
    <th class="text-center text-uppercase">STATUS</th>
    <th class="text-center text-uppercase">ACTION</th>
  </tr>

          <?php
          foreach ($data as $index=>$row) {
            ?>

            <tr>
              <td>
                <?php echo $index+1; ?>
              </td>
              <td>
                <?php echo $row["ex_title"]; ?>
              </td>
              <td>
                <?php echo $row["p_name"]; ?>
              </td>
              <td>
                <?php echo $row["semester"]; ?>
              </td>
              <td>
                <?php echo $row["ex_year"]; ?>
              </td>
              <td>
                <?php echo $row["ex_status"]; ?>
              </td>
              <td>
                <a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_examination_exe.php?exid=<?php echo $row['ex_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_examination.php?exid=<?php echo $row['ex_id'] ?>">Edit</a>
                <a href="saveto_exam_course.php?exid=<?php echo $row['ex_id'] ?>"
                  class="btn btn-sm btn-success">SUBJECT</a>
              </td>
            </tr>
          <?php } ?>
        </table>



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