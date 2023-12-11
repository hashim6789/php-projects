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
          <h1>Available Staff Courses</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Staff Courses</h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();
        $query = "SELECT * FROM staff_course sc JOIN course c ON (c.c_id=sc.fk_cid) 
                                        JOIN staff s ON (sc.fk_stid=s.st_id)
                                        JOIN programme p ON (p.p_id=c.fk_pid) ";

        //echo $query;
        
        $data = $obj->GetTable($query);
        //var_dump($data);
        
        ?>
        <table class="table table-bordered">
          <tr>
            <th>ID</th>
            <th> STAFF </th>
            <th> COURSE </th>
            <th>PROGRAMME</th>
            <th>ACTION</th>
          </tr>
          <?php
          foreach ($data as $row) {
            ?>

            <tr>
              <td>
                <?php echo $row["stc_id"]; ?>
              </td>
              <td>
                <?php echo $row["st_name"]; ?>
              </td>
              <td>
                <?php echo $row["c_name"]; ?>
              </td>
              <td>
                <?php echo $row["p_name"]; ?>
              </td>

              <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_staff_course_exe.php?stcid=<?php echo $row['stc_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_staff_course.php?stcid=<?php echo $row['stc_id'] ?>">Edit</a>
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