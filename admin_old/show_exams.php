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
          <h1>Declared Examinations</h1>
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


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();
        
        $query = "SELECT * FROM examination e JOIN programme p ON (e.fk_pid=p.p_id) where ex_status = 'PUBLISHED'";
        $data = $obj->GetTable($query);
        //var_dump($data);
        
        ?>

        <table class="table table-bordered">
          <tr>
            <th> ID </th>
            <th>Exam Title</th>
            <th> Programme</th>
            <th>SEMESTER</th>
            <th>year</th>
            <th>ACTION</th>

          </tr>
          <?php
          foreach ($data as $row) {
            ?>

            <tr>
              <td>
                <?php echo $row["ex_id"]; ?>
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
                <a href="generate_exam_course.php?exid=<?php echo $row['ex_id'] ?>"
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