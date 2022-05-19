<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('conexion.php');

$data = json_decode(file_get_contents("php://input"));
$result =mysqli_query($con, "DELETE FROM students WHERE id='".$data->id."'");
   
?>

