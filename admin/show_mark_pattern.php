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
          <h1>Available Mark Patterns</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Patterns</h3>


      </div>
      <div class="card-body">
        <?php


        require_once("../connectionclass.php");
        $query = "SELECT * FROM mark_pattern mp JOIN course c ON (c.c_id=mp.fk_cid)
                                        JOIN programme p ON (p.p_id=c.fk_pid)";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <table class="table table-bordered">
          <tr>
            <th> ID </th>
            <th>PROGRAMME </th>
            <th>COURSE </th>
            <th>SEMESTER </th>
            <th>PART </th>
            <th>MARK</th>
            <th>ORDER</th>
            <th>ACTION</th>
          </tr>
          <?php
          foreach ($data as $row) {
            ?>

            <tr>
              <td>
                <?php echo $row["mpat_id"]; ?>
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
                <?php echo $row["mark"]; ?>
              </td>
              <td>
                <?php echo $row["m_order"]; ?>
              </td>
              <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_mark_pattern_exe.php?mpid=<?php echo $row['mpat_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_mark_pattern.php?mpid=<?php echo $row['mpat_id'] ?>">Edit</a>
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