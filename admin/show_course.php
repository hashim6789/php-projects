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
        <a class="btn btn-sm btn-primary float-right" href="add_course.php">ADD</a>


      </div>
      <div class="card-body">

        <?php


        require_once("../connectionclass.php");
        $pid="";

        $query = "SELECT * FROM course c JOIN programme p ON (c.fk_pid = p.p_id) order by p.p_id,sem_no";
        if(isset($_GET['pid'])){
          $pid=$_GET['pid'];
           $query = "SELECT * FROM course c JOIN programme p ON (c.fk_pid = p.p_id) where p.p_id=$pid order by sem_no";
        }

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        $sql = "SELECT * FROM programme"; 
        $courses = $obj->GetTable($sql);
        // var_dump($data);
        
        ?>
  <form action="show_course.php" method="get" class="form-inline">
            <div class="form-group">
              <label for="pid">Programme:</label>
              <select name="pid" id="pid" class="form-control" required>
                <option value="">Select any programme</option>
                <?php foreach ($courses as $row) {
                  $selected="";
                  if($pid==$row['p_id']){
                    $selected="selected";
                  }else{
                    $selected="";
                  }
                  
                  ?>
                  <option <?php echo $selected  ?> value="<?php echo $row["p_id"]; ?>">
                    <?php echo $row["p_name"]; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
 

              <button type="submit" class="btn btn-primary">Search</button>
          </form>
        <table class="table table-bordered">
          <tr>
            <th> SL NO</th>
            <th>SUBJECT NAME </th>
            <th>SUBJECT CODE </th>
            <th>SEMESTER </th>
            <th>COURSE NAME </th>
            <th>ACTION</th>
          </tr>
          <?php
          if(count($data)>0){
          foreach ($data as $index=>$row) {
            ?>

            <tr>
              <td>
                <?php echo $index+1; ?>
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
             <!--   <a class="btn btn-sm btn-success"
                  href="add_exam_sub_pat_setting.php?cid=<?php echo $row['c_id'] ?>&pid=<?php echo $row['p_id'] ?>">settings</a>-->
              </td>
            </tr>
          <?php }
          }else{
            ?>
<tr>
  <th colspan="6">NO DATA FOUND</th>
</tr>
            <?php
          }
          
          
          ?>
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