<?php
/*get informations from database for sign in form*/
header("Content-Type", "application/json");
$data=json_decode(file_get_contents("php://input"));
$con=mysqli_connect("localhost", "root","","MyDataBase");
if($con->connect_error) 
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
/*check if email and password exist in data base*/
$res=mysqli_query($con, "select * from users where password ='".$data->password."' and email='".$data->mail."'");

$result=array();
	if(mysqli_num_rows($res)){
		/*if email and password are correct, so return 1*/
$result=['id'=>1];
	}
	else{
		/*if email and password are incorrect, so return -1*/
		$result=['id'=>-1];

	}
echo json_encode($result);

mysqli_close($con);
?>
