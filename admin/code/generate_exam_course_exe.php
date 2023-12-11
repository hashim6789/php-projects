<?php

require_once("../../connectionclass.php");
$obj = new Connectionclass();
// Function to shuffle each sub-array
function shuffleSubArray($subArray) {
    shuffle($subArray);
    return $subArray;
}
$excid =$_REQUEST['excid'];

$sql ="select * from exam_course where ex_cid=$excid";

 $exam_subject = $obj->GetSingleRow($sql);

 if($exam_subject!=null){

    $cid= $exam_subject['fk_cid'];
    $exam_id= $exam_subject['fk_exid'];
    $ex_cid= $exam_subject['ex_cid'];
    // clear all questions already generated

     $qy="delete from  exam_paper where fk_exid=$exam_id and fk_excid=$cid";
    $r=$obj->Manipulation($qy);
 
 

 $query = "SELECT part,mark,total_qns,mp.fk_cid,mpat_id FROM examcourse_patternsetting ep JOIN mark_pattern mp ON (ep.fk_mpat_id=mp.mpat_id) JOIN exam_course ec ON (ec.fk_cid = mp.fk_cid ) where ec.fk_exid=$exam_id and mp.fk_cid=$cid ";
$data = $obj->GetTable($query);
$validation=true;
$errors=array();
 foreach($data as $index=>$row){
    $part= $row['part'];
    $total_questions= $row['total_qns'];
    $mpat_id= $row['mpat_id'];
    // CASE -1 ; CHECK ALL QUESTIONS AVAILABLE 
    $q= "select * from course_module cm join questions q on(cm.mod_id = q.fk_modid) where fk_patid=$mpat_id";
    $questions = $obj->GetTable($q);
   
    $data[$index]['questions']=$questions;
     if(count($questions)<$total_questions){
        $validation=false;
        $error_message ="$part section has no sufficient questions. please add questions";
        $errors[]=$error_message;
     }
        
 }
 
 if($validation == false){

    //var_dump($errors);
    ?>
<center>
    <?php
        foreach($errors as $row){
            echo "<h3>".$row."</h3>";
        }
    ?>
    <a class="btn btn-danger" href="../show_module.php">Show Modules</a>
</center>

<?php

 }else{
    // valid can save
    foreach($data as $row){
        $part= $row['part'];
        $total_questions= $row['total_qns'];
        $mpat_id= $row['mpat_id'];
        $questions= $row['questions'];
         $questions = shuffleSubArray($questions);
       //  var_dump(array_column($questions,'qn'));
       //  echo "<hr>";
        $counter=0;
        foreach( $questions as $q){
            $counter=$counter+1;
            $qn_id =$q['qn_id'];
            
            $sql ="insert into exam_paper(fk_exid,	fk_excid,fk_qnid) values($exam_id,$cid, $qn_id)";
            $obj->Manipulation($sql);
            if($counter== $total_questions){
                break;
            }
        }
        
            
     }

     $qy="update  exam_course set exc_status='GENERATED' where fk_exid=$exam_id and fk_cid=$cid";
     $r=$obj->Manipulation($qy);
     header("location:../show_generated_question_paper.php?excid=$ex_cid");


 }


 }


 