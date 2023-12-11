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
          <h1>Available Questions</h1>
        </div>
        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $cmid = $_GET["cmid"];
        $cid = $_GET["cid"];

        $query = "SELECT mod_name FROM course_module WHERE mod_id=$cmid";
        $data6 = $obj->GetSingleData($query);
        //var_dump($data6);
        
        $query = "SELECT * FROM programme ";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM course ";
        $data2 = $obj->GetTable($query);
        //var_dump($data2);
        
        $query = "SELECT * FROM mark_pattern WHERE fk_cid=$cid";
        $data3 = $obj->GetTable($query);
        //var_dump($data3);
        
        $query = "SELECT * FROM course_module";
        $data4 = $obj->GetTable($query);
        //var_dump($data4);
        

        ?>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- Content for the first column (8 columns) goes here -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <?php echo $data6 ?>
              </h3>


            </div>
            <div class="card-body">
              <?php


              $query = "SELECT * FROM questions q JOIN mark_pattern mp ON (q.fk_patid = mp.mpat_id)
                                                  WHERE fk_modid=$cmid ORDER BY part";
              //echo $query;
              $data = $obj->GetTable($query);


              ?>

              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>QUESTION </th>
                  <th>MARK </th>
                  <th>PART </th>
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
                      <?php echo $row["qn"]; ?>
                    </td>
                    <td>
                      <?php echo $row["mark"]; ?>
                    </td>
                    <td>
                      <?php echo $row["part"]; ?>
                    </td>
                    <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                        href="code/delete_questions_exe.php?qnid=<?php echo $row['qn_id'] ?>&cid=<?php echo $cid ?>&cmid=<?php echo $cmid ?>">Delete</a>
                      <a class="btn btn-sm btn-primary"
                        href="edit_questions.php?qnid=<?php echo $row['qn_id'] ?>&cmid=<?php echo $cmid ?>&cid=<?php echo $cid ?>">Edit</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>


        </div>
        <div class="col-md-4">
          <!-- Content for the second column (4 columns) goes here -->
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add</h3>

            </div>
            <div class="card-body">





              <div>
                <form action="code/add_questions_exe.php" method="post">

                  <!-- <div class="form-group">
      <label for="sid">Course</label>
      <select class="form-control" name="cid" id="cid">
        <option value="">Select course</option>
        <?php foreach ($data1 as $row) { ?>
          <option value="<?php echo $row["p_id"]; ?>">
            <?php echo $row['p_name'] ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="sid">Subject</label>
      <select class="form-control" name="sid" id="sid">
        <option value="">Select pattern</option>
        <?php foreach ($data2 as $row) { ?>
          <option value="<?php echo $row["c_id"]; ?>">
            <?php echo $row['c_name'] ?>
          </option>
        <?php } ?>
      </select>
    </div> -->

                  <div class="form-group">
                    <label for="">Question Pattern</label>
                    <select class="form-control" name="patid" id="">
                      <option value="">Select pattern</option>
                      <?php foreach ($data3 as $row) { ?>
                        <option value="<?php echo $row["mpat_id"] ?>">
                          <?php echo "PART " . $row['part'] . " " . $row['mark'] . "- MARKS" . "(" . $row['m_order'] . ")" ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- <div class="form-group">
      <label for="sid">Modules</label>
      <select class="form-control" name="mid" id="mid">
        <option value="">Select pattern</option>
        <?php foreach ($data4 as $row) { ?>
          <option value="<?php echo $row["mod_id"]; ?>">
            <?php echo $row['mod_name'] ?>
          </option>
        <?php } ?>
      </select>
    </div> -->

                  <div class="form-group">
                    <label for="qs">Questions</label>
                    <input type="text" class="form-control" name="qs" id="qs">
                  </div>
                  <input type="hidden" name="cid" value="<?php echo $cid ?>">
                  <input type="hidden" name="cmid" value="<?php echo $cmid ?>">


                  <button type="submit" class="btn btn-primary" name="sub">ADD</button>
                </form>
              </div>



            </div>
            <!-- /.card-body -->

          </div>
        </div>
      </div>
    </div>



    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once("../admin/footer.php");
?>