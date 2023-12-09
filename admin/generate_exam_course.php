<?php
require_once("header.php");


 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
          $query = "SELECT * FROM exam_course ec JOIN course c ON (ec.fk_cid=c.c_id) WHERE fk_exid = $exid";
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




              <table class="table table-bordered">
                <tr>
                  <th> ID </th>
                  <th>SUBJECT NAME </th>
                  <th>SUBJECT CODE </th>
                  <th>ACTION</th>

                </tr>
                <?php
                foreach ($data1 as $row) {

               
                  $pid=$row['fk_pid'];
                  $cid=$row["c_id"];

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
                   
                    
                    <td>
                    <a href="code/generate_exam_course_exe.php?excid=<?php echo $row['ex_cid'] ?>"
                  class="btn btn-sm btn-success">GENERATE</a>
                  <a href="show_exam_sub_pat_setting.php?pid=<?php echo $pid ?>&cid=<?php echo $cid ?>"
                  class="btn btn-sm btn-success">MARK PATTERNS</a>
                  
              </td>
                  </tr>
                <?php } ?>
              </table>
            </form>
          </div>
          <?php
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