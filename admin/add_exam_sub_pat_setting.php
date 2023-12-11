 
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
        $exam_id = $_GET['exam_id'];
        $query = "SELECT * FROM mark_pattern WHERE fk_cid=$cid";
        $data1 = $obj->GetTable($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM examination WHERE fk_pid=$pid and ex_id=$exam_id ";
        $data2 = $obj->GetTable($query);
        //var_dump($data2);
        


        ?>
        <div class="col-md-6">
        <form action="code/add_exam_sub_pat_setting_exe.php" method="post">
    <div class="form-group">
        <label for="exid">Exam title</label><br>
        <select class="form-control" name="exid" id="exid" required>
            <?php foreach ($data2 as $row) { ?>
                <option value="<?php echo $row["ex_id"]; ?>">
                    <?php echo $row["ex_title"] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="patid">Pattern</label><br>
        <select class="form-control" name="patid" id="patid" required>
            <option value="">Select a pattern</option>
            <?php foreach ($data1 as $row) { ?>
                <option value="<?php echo $row["mpat_id"]; ?>">
                    <?php echo "PART " . $row['part'] . " " . $row['mark'] . "- MARKS" . "(" . $row['m_order'] . ")" . "   "  ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="tqns">Total questions</label>
        <input type="number" name="tqns" class="form-control" required>
    </div>

    <button type="submit" name="sub" class="btn btn-primary">ADD</button>
    <input type="hidden" name="pid" value="<?php echo $pid ?>" />
    <input type="hidden" name="cid" value="<?php echo $cid ?>" />
    <input type="hidden" name="exam_id" value="<?php echo $exam_id ?>" />
</form>

        </div>


      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
 