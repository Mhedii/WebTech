<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$firstname=$email=$address=$dob="";
$interest1=$interest2=$interest3=$interest4="";
$profession1=$profession2=$profession3=$profession4="";


$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}
      
      if(  $row["interests"]=="music" )
      { $interest1="Submit"; }
      else if(  $row["interests"]=="sports" )
      { $interest2="Submit"; }
      else if(  $row["interests"]=="fishing" )
      { $interest3="Submit"; }
      else if(  $row["interests"]=="reading" )
      { $interest4="Submit"; }

     
      
  } 
}
  else {
    echo "0 results";
  }



?>

<form action='' method='post'>
firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" ><br>

email : <input type='text' name='email' value="<?php echo $email; ?>" ><br>
 Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other
<br>
Address : <input type='text' name='address' value="<?php echo $address; ?>" ><br>
Date Of Birth<input type="date"id="dob" name="dob"><br>

<label for="profession">Select profession:</label>
  <select name="profession" id="profession">
    <option value="Academician">Academician</option>
    <option value="Student">Student</option>
    <option value="Teacher">Teacher</option>
    <option value="Businessman">Businessman</option>
  </select>
 
  <br>

Interests:
     <input type='checkbox' name='interests[]' value='music'<?php echo $interest1; ?>>Music
     <input type='checkbox' name='interests[]' value='sports' <?php echo $interest2; ?> >Sports
     <input type='checkbox' name='interests[]' value='fishing'<?php  echo $interest3; ?> > Fishing
     <input type='checkbox' name='interests[]' value='reading'<?php  echo $interest4; ?> > Reading
     <br>
    

     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>

<br>
<br>
<a href="../view/pageone.php">Back </a>

<a href="../control/logout.php"> logout</a>

</body>
</html>