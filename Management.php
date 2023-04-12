<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Management.css" type="text/css" charset="utf-8"/>
    <title>Management page</title>
</head>
<body>
<div class="table-users">
   <div class="header">Users</div>
   <?php 
      $id = 1;
      $con = mysqli_connect('localhost','root','','group49');
      echo"<table cellspacing=\"0\">
           <tr>
                <th>UserID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
           </tr>";

           $fh = mysqli_query($con,"select MAX(userID) from userinfo");
           $c_echo = mysqli_fetch_array($fh);
           $maxid = number_format($c_echo['MAX(userID)'],0);
           while ($id <= $maxid) {
           $sql = "SELECT * FROM userinfo WHERE userID = $id;";
           $result = mysqli_query($con,$sql);
           while ($row = mysqli_fetch_array($result)) {
            echo"<tr>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['userName'] . "</td>";
            echo "<td>" . $row['pw'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['admin'] . "</td>";
            echo "<td><button onclick=\"window.location.href='Manageuser.php?id=" . $row["userID"] . "'\">Edit</button></td>";
            echo "<td><button><a onclick=\"return confirm('Confirm to delete')\" href='delete.php?id=" . $row["userID"] . "'\">Delete</a></button></td>";
            echo "</tr>";
            }
           $id=$id+1;
           }
           echo "</table>";
   ?>
   

      
</div> 


     
     
</body>
</html>