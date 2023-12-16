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
                    <h1>Available Staffs</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Staffs</h3>
                <a class="btn btn-sm btn-primary float-right" href="add_staff.php">ADD</a>

            </div>
            <div class="card-body">


                <?php

                require_once("../connectionclass.php");
                $query = "SELECT * FROM staff";

                $obj = new Connectionclass();
                $data = $obj->GetTable($query);
                // var_dump($data);
                
                ?>


                <table class="table table-bordered">
                    <tr>
                        <th> ID </th>
                        <th> NAME </th>
                        <th> PHONE </th>
                        <th> EMAIL </th>
                        <th> GENDER </th>
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
                                <?php echo $row["st_name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["st_phone"]; ?>
                            </td>
                            <td>
                                <?php echo $row["st_email"]; ?>
                            </td>
                            <td>
                                <?php echo $row["gender"]; ?>
                            </td>
                            <td><a onclick="return confirm('are you sure want to delete?')" class="btn btn-sm btn-danger"
                                    href="code/delete_staff_exe.php?stid=<?php echo $row['st_id'] ?>">Delete</a>
                                <a class="btn btn-sm btn-primary"
                                    href="edit_staff.php?stid=<?php echo $row['st_id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
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