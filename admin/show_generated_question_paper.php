
<style>
  .container{
    margin:0 auto;
    border:1px solid black;
    padding:10px;
     
  }
  *{
    margin:0px;
  }
</style>
<?php
 
require_once("../connectionclass.php");

$obj = new Connectionclass();
 
?>

 
        <?php
 
 $excid = $_GET["excid"];



        $query = "SELECT * FROM examination e join exam_course ec  on(e.ex_id=ec.fk_exid) join course c on(c.c_id=ec.fk_cid) WHERE ex_cid=$excid";
        //echo $query;
        $data = $obj->GetSingleRow($query);
        $pid = $data["fk_pid"];
        $query = "SELECT p_name FROM programme WHERE p_id = $pid ";
        $pname = $obj->GetSingleData($query);

        $cid = $data["fk_cid"];
        $query = "SELECT c_name FROM course WHERE c_id = $cid ";
        $cname = $obj->GetSingleData($query);

        if (is_array($data)) {
          $pid = $data["fk_pid"];
          $sem = $data["semester"];
          $c_id = $data["c_id"];
          $ex_id = $data["ex_id"];
          $ex_cid = $data["ex_cid"];
          
           $q= "select * from mark_pattern mp join examcourse_patternsetting ep on(mp.mpat_id=ep.fk_mpat_id) where fk_cid=$c_id and fk_exid=$ex_id order by m_order";

         $patterns = $obj->GetTable($q);
          

          ?>

          <div class="container">
            <center>
            <h1> <?php echo $data["ex_title"] ?></h1>
            <h2> <?php echo   $pname ?></h2>
            <h2> <?php echo   $cname ?></h2>
            <!-- <h3> <?php echo "Semester : ".$data["semester"] ?></h3> -->

            </center>
              



  

<table width="100%">

            <?php

                foreach($patterns as $p){
                  $mpat_id = $p['mpat_id'];
                   $sql= "select * from exam_paper ep join questions q on(q.qn_id= ep.fk_qnid) where fk_excid=$c_id and fk_patid=$mpat_id";
                  $questions = $obj->GetTable($sql);
                  
                  ?>
                   <tbody>
                    <tr >
                      <th align="center"><u>PART - <?php echo $p['part']   ?>[<?php echo $p['total_qns'] . " x ".$p['mark'] ." = " . $p['total_qns'] *$p['mark']    ?>]<u></th>
                    </tr>
                    <?php
foreach($questions as $index=>$q){
  ?>
<tr>
  <td><?php echo $index+1  ?> ). <?php echo $q['qn']  ?></td>
</tr>
  <?php

}

?>
                   </tbody>

<?php
                }


?>
</table>

          </div>
          <?php
        } 
        ?>

   

 