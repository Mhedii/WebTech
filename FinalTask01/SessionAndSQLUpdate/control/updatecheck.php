<?php
include('../model/db.php');


 $error="";

if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['address'])|| empty($_POST['dob'])|| empty($_POST['profession'])|| empty($_POST['interests']) ) {
$error = "input given is invalid";
}
else
{
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->UpdateUser($conobj,"student",$_SESSION["username"],$_POST['firstname'],$_POST['email'],$_POST['gender'],$_POST['address'],$_POST['dob'],$_POST['profession'],implode(',',$_POST['interests']));
if($userQuery==TRUE)
{
    echo "update successful"; 
}
else
{
    echo "could not update";    
}
$connection->CloseCon($conobj);

}
}


?>
