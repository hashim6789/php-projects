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
          <h1>Available Programmes</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Programmes</h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $query = "SELECT * FROM programme";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <table class="table table-bordered">
          <tr>
            <th> ID </th>
            <th> Programme</th>
            <th>ACTION</th>

          </tr>
          <?php
          foreach ($data as $row) {
            ?>

            <tr>
              <td>
                <?php echo $row["p_id"]; ?>
              </td>
              <td>
                <?php echo $row["p_name"]; ?>
              </td>
              <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                  href="code/delete_programme_exe.php?pid=<?php echo $row['p_id'] ?>">Delete</a>
                <a class="btn btn-sm btn-primary" href="edit_programme.php?pid=<?php echo $row['p_id'] ?>">Edit</a>
              </td>
            </tr>
          <?php } ?>
        </table>



      </div>
      <!-- /.card-body -->

      </divp <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once("footer.php");
?>