<?php
class database{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "lab03";
 $connection = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
//  ,$name,$email,$username,$password,$gender,$date
 
 return $connection;
 }
 function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
 return $result;
 }

 function DB($connection,$name,$email,$username,$password,$gender,$date)
 {
    //  if($connection-> connect_error){
    //      die("Connection failed:" . $connection->connect_error);
    //  }
        $name="";
        $username="";
        $email="";
        $gender="";
        $date="";
        $password="";

        $sql="INSERT INTO information(Name,Email,UserName,Password,Gender,DateOfBirth)
              VALUES('$name','$email','$username','$password','$gender','$date')";
              $result=$connection->query($sql);
              if($result)
              {
                echo "new record inserted";
              }
              else
              {
                echo "error occurred".$connection->error;
              }
 }


function CloseCon($connection)
 {
 $connection -> close();
 }
}
?>