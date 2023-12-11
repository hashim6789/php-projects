<?php
require_once("header.php");
require_once("../connectionclass.php");

$obj = new Connectionclass();
$username= $_SESSION['username'];
$sql="select st_id from staff where st_email='$username'";
  $staff_id= $obj->getSingleData($sql);

 
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
          $query = "SELECT * FROM exam_course ec JOIN course c ON (ec.fk_cid=c.c_id) WHERE fk_exid = $exid and   c_id in(select fk_cid from staff_course where fk_stid=$staff_id) ";
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
                  <th>STATUS</th>
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
                      <?php echo $row["exc_status"]; ?>
                    </td>
                   
                    <td>
                      <?php
if($row["exc_status"]=="GENERATED"){
?>
<a href="code/generate_exam_course_exe.php?excid=<?php echo $row['ex_cid'] ?>"
                  class="btn btn-sm btn-success">RE-GENERATE</a>
                  <a href="show_generated_question_paper.php?excid=<?php echo $row['ex_cid'] ?>"
                  class="btn btn-sm btn-danger">PRINT</a>
<?php
}else{
  ?>
<a href="code/generate_exam_course_exe.php?excid=<?php echo $row['ex_cid'] ?>"
                  class="btn btn-sm btn-success">GENERATE</a>
  <?php
}

?>
                    
                  <a href="show_exam_sub_pat_setting.php?exam_id=<?php echo $exid ?>&pid=<?php echo $pid ?>&cid=<?php echo $cid ?>"
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