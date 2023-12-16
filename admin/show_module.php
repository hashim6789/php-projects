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
          <h1>Available Modules</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Modules</h3>
        <a class="btn btn-sm btn-primary float-right" href="add_module.php">ADD</a>


      </div>
      <div class="card-body">
        <?php
        require_once("../connectionclass.php");
        $query = "SELECT * FROM course_module cm 
                   JOIN course c on (cm.fk_cid = c.c_id)
                   JOIN programme p on (p.p_id = c.fk_pid) where c_id in(select fk_cid from staff_course where fk_stid=$staff_id) order by c_id asc";
        //echo $query;
        
        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <table class="table table-bordered">
          <tr>
            <th>ID </th>
            <th>MODULE </th>
            <th>MODULE NO</th>
            <th>COURSE </th>
            <th>SEMESTER</th>
            <th>PROGRAMME </th>
            <th>ACTION</th>
          </tr>
          <?php
          foreach ($data as $index=>$row) {
            ?>

            <tr>
              <td>
                <?php echo $index+1; ?>
              </td>
              <td>
                <?php echo $row["mod_name"]; ?>
              </td>
              <td>
                <?php echo $row["mod_no"]; ?>
              </td>
              <td>
                <?php echo $row["c_name"]; ?>
              </td>
              <td>
                <?php echo $row["sem_no"]; ?>
              </td>
              <td>
                <?php echo $row["p_name"]; ?>
              </td>
              <td>
                <a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_module_exe.php?cmid=<?php echo $row['mod_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_module.php?cmid=<?php echo $row['mod_id'] ?>">Edit</a>
                <a class="btn btn-sm btn-success"
                  href="show_questions.php?cmid=<?php echo $row['mod_id'] ?>&cid=<?php echo $row['c_id'] ?>">Question</a>
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
require_once("../admin/footer.php");
?>