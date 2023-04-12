<?php 
 require "dbconn.php";
 
 $con = mysqli_connect('localhost','root','','group49');
 if(!$con)
{
    echo "link failly";
}



$sql="INSERT into participant(firstName,lastName,Gender,DOB) values ('$_POST[fname]','$_POST[lname]', '$_POST[gender]','$_POST[dob]')";


if (mysqli_query($con, $sql)) {
   echo "Adding successfully";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($con);

header("Location:http://localhost/week9/participants.php");
exit();