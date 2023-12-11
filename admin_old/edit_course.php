<?php
require_once("header.php");
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Courses</h1>
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

                $cid = $_GET["cid"];

                $query = "SELECT * FROM course c JOIN programme p ON (c.fk_pid=p.p_id) WHERE c_id = $cid";
                //echo $query;
                $data1 = $obj->GetSingleRow($query);
                //var_dump($data1);
                

                $query = "SELECT * FROM programme";
                $data2 = $obj->GetTable($query);
                //var_dump($data2);
                
                ?>

                <div class="col-md-6">
                    <form action="code/update_course_exe.php" method="post">

                        <div class="form-group">
                            <label for="pid">Programmes</label>
                            <select class="form-control" id="pid" name="pid">
                                <option value="<?php echo $data1["fk_pid"]; ?>">
                                    <?php echo $data1["p_name"]; ?>
                                </option>
                                <?php foreach ($data2 as $row) { ?>
                                    <option value="<?php echo $row["p_id"]; ?>">
                                        <?php echo $row["p_name"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cname">Enter Course Name:</label>
                            <input type="text" class="form-control" id="cname" name="cname"
                                value="<?php echo $data1["c_name"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="ccode">Enter Course Code:</label>
                            <input type="text" class="form-control" id="ccode" name="ccode"
                                value="<?php echo $data1["c_code"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="semester">Select Semester:</label>
                            <select class="form-control" id="semester" name="sem">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                            </select>
                        </div>


                        <input type="hidden" name="cid" value="<?php echo $cid; ?>">

                        <button type="submit" class="btn btn-primary">UPDATE</button>

                </div>
                </form>
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