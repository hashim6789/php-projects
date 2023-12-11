<?php
require_once("header.php");
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Staff</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit </h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");

        $stid = $_GET["stid"];

        $obj = new Connectionclass();

        $query = "SELECT * FROM staff s JOIN programme p ON (p.p_id=s.fk_pid) WHERE st_id = $stid";
        $data1 = $obj->GetSingleRow($query);
        //var_dump($data1);
        
        $query = "SELECT * FROM programme";
        $data2 = $obj->GetTable($query);

        //var_dump($data2);
        
        ?>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <form action="./code/update_staff_exe.php" method="post">
                <div class="form-group">
                  <label for="pid">Programme:</label>
                  <select class="form-control" name="pid" id="pid">
                    <option value="<?php echo $data1["fk_pid"] ?>">
                      <?php echo $data1["p_name"] ?>
                    </option>
                    <?php foreach ($data2 as $row) { ?>
                      <option value="<?php echo $row["p_id"] ?>">
                        <?php echo $row["p_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="stname">Enter staff name:</label>
                  <input type="text" class="form-control" name="stname" id="stname"
                    value="<?php echo $data1["st_name"] ?>">
                </div>

                <div class="form-group">
                  <label for="stphone">Enter staff phone no:</label>
                  <input type="text" class="form-control" name="stphone" id="stphone"
                    value="<?php echo $data1["st_phone"] ?>">
                </div>

                <div class="form-group">
                  <label for="stmail">Enter e-mail id:</label>
                  <input type="email" class="form-control" name="stmail" id="stmail"
                    value="<?php echo $data1["st_email"] ?>">
                </div>

                <div class="form-group">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Gender:</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stgender" id="male" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stgender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stgender" id="others" value="Others">
                        <label class="form-check-label" for="others">Others</label>
                      </div>
                    </div>

                    <input type="hidden" name="stid" value="<?php echo $stid ?>">

                    <button type="submit" class="btn btn-primary">UPDATE</button>
              </form>
            </div>
          </div>
        </div>




      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>








<?php
require_once("footer.php");
?>