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
          <h1>Add Staff</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add </h3>


      </div>
      <div class="card-body">


        <?php
        require_once("../connectionclass.php");
        $query = "SELECT * FROM programme";

        $obj = new Connectionclass();
        $data = $obj->GetTable($query);
        // var_dump($data);
        
        ?>

        <div class="col-md-6">
          <form action="./code/add_staff_exe.php" method="post">
            <div class="form-group">
              <label for="pid">Programmes :</label>
              <select class="form-control" id="pid" name="pid">
                <option value="">Select any programme</option>
                <?php foreach ($data as $row) { ?>
                  <option value="<?php echo $row["p_id"]; ?>">
                    <?php echo $row["p_name"]; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="stname">Staff Name :</label>
              <input type="text" class="form-control" id="stname" name="stname">
            </div>
            <div class="form-group">
              <label for="stphone">Staff Phone :</label>
              <input type="text" class="form-control" id="stphone" name="stphone">
            </div>
            <div class="form-group">
              <label for="stmail">Staff Email :</label>
              <input type="email" class="form-control" id="stmail" name="stmail">
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


              </div>
              <button type="submit" class="btn btn-primary" name="submit">ADD</button>
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