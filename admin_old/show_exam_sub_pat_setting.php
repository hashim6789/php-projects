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
          <h1>Available Examinaton Patterns</h1>
        </div>

      </div>
    </div><!-- /.containp
    </section>

    <!- Main content -->
    <section class="row">
    <div class="col-md-8">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Patterns</h3>


        </div>
        <div class="card-body">
          <?php

$cid = $_GET["cid"];
          require_once("../connectionclass.php");
           $query = "SELECT * FROM examcourse_patternsetting ep JOIN mark_pattern mp ON(ep.fk_mpat_id=mp.mpat_id)
                                                      JOIN course c ON (c.c_id=mp.fk_cid)
                                                      JOIN programme p ON (p.p_id=c.fk_pid)  where c.c_id=$cid " ;

          $obj = new Connectionclass();
          $data = $obj->GetTable($query);
          //var_dump($data);
          
          ?>

          <table class="table table-bordered">
            <tr>
              <th> ID </th>
              <th>PROGRAMME </th>
              <th>COURSE </th>
              <th>SEMESTER </th>
              <th>PART</th>
              <th>TOTAL QNS</th>
              <th>ACTION</th>
            </tr>
            <?php
            foreach ($data as $row) {
              ?>

              <tr>
                <td>
                  <?php echo $row["exc_pat_id"]; ?>
                </td>
                <td>
                  <?php echo $row["p_name"]; ?>
                </td>
                <td>
                  <?php echo $row["c_name"]; ?>
                </td>
                <td>
                  <?php echo $row["sem_no"]; ?>
                </td>
                <td>
                  <?php echo $row["part"]; ?>
                </td>
                <td>
                  <?php echo $row["total_qns"]; ?>
                </td>
                <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                    href="code/delete_exam_sub_pat_setting_exe.php?epid=<?php echo $row['exc_pat_id'] ?>">Delete</a>
                  <a class="btn btn-sm btn-primary"
                    href="edit_exam_sub_pat_setting.php?epid=<?php echo $row['exc_pat_id'] ?>&pid=<?php echo $row['p_id'] ?>&cid=<?php echo $row['c_id'] ?>">Edit</a>
                </td>
              </tr>
            <?php } ?>
          </table>

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </div>

<div class="col-md-4">
<?php  require_once('add_exam_sub_pat_setting.php')   ?>
</div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once("../admin/footer.php");
?>