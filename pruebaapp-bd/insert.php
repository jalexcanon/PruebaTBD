<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('conexion.php');

$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$lastName=$data->lastName;
$idnumber=$data->idnumber;
$career=$data->career;
$course=$data->course;
$mean=$data->mean;
$semester=$data->semester;
$projects=$data->projects;

if(($name!="")&&($lastName!="")&&($idnumber!="")&&($career!="")&&($course!="")&&($mean!="")
        &&($semester!="")&&($projects!="")){
        $query=mysqli_query($con,"INSERT INTO students (name,lastName,idnumber,career)
         VALUES('$name','$lastName','$idnumber','$career') ");
        $newid = mysqli_insert_id($con);
        $queryC=mysqli_query($con,"INSERT INTO course (course,mean,semester, projects, id_student)
            VALUES('$course','$mean','$semester','$projects', '$newid')");
        
        if($query && $queryC){
            $response=array(
                'status'=>'valid'
            );
            echo json_encode($response);
        }
        else {
            $response=array(
                'status'=>'invalid'
            );
            echo json_encode($response);
        }

}
exit();

?>