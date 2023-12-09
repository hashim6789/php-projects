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
          <h1>Available Courses</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Courses</h3>


      </div>
      <div class="card-body">

        <?php


        require_once("../connectionclass.php");
        $query = "SELECT * FROM course c JOIN programme p ON (c.fk_pid = p.p_id)";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <table class="table table-bordered">
          <tr>
            <th> ID </th>
            <th>SUBJECT NAME </th>
            <th>SUBJECT CODE </th>
            <th>SEMESTER </th>
            <th>COURSE NAME </th>
            <th>ACTION</th>
          </tr>
          <?php
          foreach ($data as $row) {
            ?>

            <tr>
              <td>
                <?php echo $row["c_id"]; ?>
              </td>
              <td>
                <?php echo $row["c_name"]; ?>
              </td>
              <td>
                <?php echo $row["c_code"]; ?>
              </td>
              <td>
                <?php echo $row["sem_no"]; ?>
              </td>
              <td>
                <?php echo $row["p_name"]; ?>
              </td>
              <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_course_exe.php?cid=<?php echo $row['c_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_course.php?cid=<?php echo $row['c_id'] ?>">Edit</a>
                <a class="btn btn-sm btn-success"
                  href="add_exam_sub_pat_setting.php?cid=<?php echo $row['c_id'] ?>&pid=<?php echo $row['p_id'] ?>">settings</a>
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