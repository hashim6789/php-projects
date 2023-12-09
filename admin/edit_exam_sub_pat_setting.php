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
          <h1>Edit Examinaton Pattern</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit</h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $epid = $_GET["epid"];
        $pid = $_GET["pid"];
        $cid = $_GET["cid"];
        $query = "SELECT * FROM mark_pattern WHERE fk_cid=$cid";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM examination WHERE fk_pid=$pid";
        $data2 = $obj->GetTable($query);
        //var_dump($data2);
        
        $query = "SELECT * FROM examination e JOIN mark_pattern mp ON (e.fk_pid=mp.fk_pid)
                                          JOIN examcourse_patternsetting ep ON (ep.fk_exid=e.ex_id)";
        $data3 = $obj->GetSingleRow($query);
        //var_dump($data3);
        

        ?>
        <div class="col-md-6">
          <form action="code/update_exam_sub_pat_setting_exe.php" method="post">

            <div class="form-group">
              <label for="">Exam title</label><br>
              <select class="form-control" name="exid" id="exid">
                <option value="<?php echo $data3["ex_id"] ?>">
                  <?php echo $data3["ex_title"] ?>
                </option>
                <?php foreach ($data2 as $row) { ?>
                  <option value="<?php echo $row["ex_id"]; ?>">
                    <?php echo $row["ex_title"] ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Pattern</label><br>
              <select class="form-control" name="patid" id="patid">
                <option value="<?php echo $data3["mpat_id"] ?>">
                  <?php echo "PART " . $data3['part'] . " " . $data3['mark'] . "- MARKS" . "(" . $data3['m_order'] . ")" ?>
                </option>
                <?php foreach ($data1 as $row) { ?>
                  <option value="<?php echo $row["mpat_id"]; ?>">
                    <?php echo "PART " . $row['part'] . " " . $row['mark'] . "- MARKS" . "(" . $row['m_order'] . ")" ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Total questions</label>
              <input type="number" name="tqns" class="form-control" value="<?php echo $data3["total_qns"] ?>">
            </div>
            <input type="hidden" name="epid" value="<?php echo $epid ?>">
            <button type="submit" name="sub" class="btn btn-primary">UPDATE</button>
          </form>
        </div>


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