<?php
require_once("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <?php


        require_once("../connectionclass.php");
        $obj = new Connectionclass();
        $exid = $_GET["exid"];



        $query = "SELECT * FROM examination WHERE ex_id=$exid";
        //echo $query;
        $data = $obj->GetSingleRow($query);

        $pid = $data["fk_pid"];
        $query = "SELECT p_name FROM programme WHERE p_id = $pid ";
        $pname = $obj->GetSingleData($query);

        if (is_array($data)) {
          $pid = $data["fk_pid"];
          $sem = $data["semester"];
          $query = "SELECT * FROM course c JOIN programme p ON (c.fk_pid = p.p_id) WHERE fk_pid=$pid AND sem_no=$sem ";
          //echo $query;
        
          $data1 = $obj->GetTable($query);
          // var_dump($data);
        


          ?>

          <div class="container">
            <form action="code/saveto_exam_course_exe.php" method="post">
              <div class="row"> <label for="">Exam:
                  <?php echo $data["ex_title"] ?>
                </label></div>
              <div class="row"> <label for="">Semester:
                  <?php echo $data["semester"] ?>
                </label></div>
              <div class="row"> <label for="">Programme:
                  <?php echo $pname ?>
                </label></div>
              <div class="row"> <label for="">Status:
                  <?php echo $data["ex_status"] ?>
                </label></div>




              <table class="table table-bordered">
                <tr>
                  <th> ID </th>
                  <th>SUBJECT NAME </th>
                  <th>SUBJECT CODE </th>

                </tr>
                <?php
                foreach ($data1 as $row) {
                  ?>
                  <input type="hidden" name="cid[]" value="<?php echo $row["c_id"] ?>">
                  <input type="hidden" name="exid" value="<?php echo $exid ?>">
                  <input type="hidden" name="sem" value="<?php echo $sem ?>">
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

                  </tr>
                <?php } ?>
              </table>
              <?php if ($data["ex_status"] == 'INACTIVE') { ?>

                <button type="submit" class="btn btn-md btn-danger">PUBLISH</button>
              <?php } ?>
            </form>
          </div>
          <?php
        } else {
          echo "NO PAGE FOUND!!";
        }
        ?>

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