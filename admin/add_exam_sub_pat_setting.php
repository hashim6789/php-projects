 
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add</h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $pid = $_GET["pid"];
        $cid = $_GET["cid"];
        $query = "SELECT * FROM mark_pattern WHERE fk_cid=$cid";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM examination WHERE fk_pid=$pid";
        $data2 = $obj->GetTable($query);
        //var_dump($data2);
        


        ?>
        <div class="col-md-6">
          <form action="code/add_exam_sub_pat_setting_exe.php" method="post">
            <div class="form-group">
              <label for="">Exam title</label><br>
              <select class="form-control" name="exid" id="exid">
                <option value="">Select a title</option>
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
                <option value="">Select a pattern</option>
                <?php foreach ($data1 as $row) { ?>
                  <option value="<?php echo $row["mpat_id"]; ?>">
                    <?php echo "PART " . $row['part'] . " " . $row['mark'] . "- MARKS" . "(" . $row['m_order'] . ")" . "   " . $cid?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Total questions</label>
              <input type="number" name="tqns" class="form-control">
            </div>
            <button type="submit" name="sub" class="btn btn-primary">ADD</button>
            <input type="hidden" name="pid" value="<?php  echo $pid  ?>" />
            <input type="hidden" name="cid" value="<?php  echo $cid  ?>" />
          </form>
        </div>


      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
 