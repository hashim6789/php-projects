
<?php
        require_once("../connectionclass.php");
        $obj = new Connectionclass();

        $query = "SELECT * FROM exam_course ec JOIN mark_pattern mp ON (ec.fk_cid = mp.fk_cid ) 
                                               JOIN examcourse_patternsetting ep ON (ep.fk_exid = ec.fk_exid )";
        $data = $obj->GetTable($query);
        var_dump($data);
        

        ?>