<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('conexion.php');
$result=mysqli_query($con,"SELECT * FROM students,course WHERE id_student = id AND id='".$_GET['id']."'");

$outp="";
while($rs=mysqli_fetch_array($result)){
    if($outp != ""){$outp .=",";}
        $outp .= '{"id":"' . $rs["id"].'",';
        $outp .= '"name":"' . $rs["name"].'",'; 
        $outp .= '"lastName":"' . $rs["lastName"].'",'; 
        $outp .= '"idnumber":"' . $rs["idnumber"].'",';
        $outp .= '"career":"' . $rs["career"].'",';
        $outp .= '"course":"' . $rs["course"].'",'; 
        $outp .= '"mean":"' . $rs["mean"].'",';
        $outp .= '"semester":"' . $rs["semester"].'",';
        $outp .= '"projects":"' . $rs["projects"].'"}'; 
        }
echo $outp;
   
?>