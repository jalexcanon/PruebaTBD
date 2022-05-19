<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('conexion.php');

$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
$name=$data->name;
$lastName=$data->lastName;
$idnumber=$data->idnumber;
$career=$data->career;
$course=$data->course;
$mean=$data->mean;
$semester=$data->semester;
$projects=$data->projects;

$query=mysqli_query($con,"UPDATE students SET name='$name',lastName='$lastName',idnumber='$idnumber',career='$career'
WHERE id =$id");
$queryC=mysqli_query($con,"UPDATE course SET course='$course',mean='$mean',semester='$semester', projects='$projects' 
WHERE id_student=$id");        
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


?>