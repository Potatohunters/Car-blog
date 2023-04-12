<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Edit page</title>
  <link rel="stylesheet" href="Manageuser.css" type="text/css" charset="utf-8"/>
</head>

<body>

        <?php
        require "dbconn.php";

        if (!isset($_GET["id"])) {
            redirect("Management.php");
        }
        $id = $_GET["id"];

        if (empty($_POST)) {
            $row = select();
            // print_r($row);
        }
        else {
            update();
            mysqli_close($conn);
            redirect("Management.php");
        }

        function redirect($url)
        {
            header("location: $url");
            exit;
        }

        function select()
        {
            global $conn;
            global $id;
            $sql = "SELECT userID, userName, pw, email, admin FROM userinfo where userID=$id;";
            $result =$conn->query($sql);
            return $result->fetch_assoc();
            
        }

        function update()
        {
            global $conn;
            global $id;
            $userid=htmlspecialchars($_POST["userid"]);
            $name=htmlspecialchars($_POST["name"]);
            $password=htmlspecialchars($_POST["password"]);
            $em=htmlspecialchars($_POST["em"]);
            $role=htmlspecialchars($_POST["role"]);
            $sql = "UPDATE userinfo set userID='$userid', userName='$name', pw='$password', email='$em', admin='$role'
            where userID=$id;";
            return $conn->query($sql);
            
        }
        ?>
<div class="container">
   <div class="title">Edit user</div>
   <div class="content">
  <!-- $_SERVER["PHP_SELF"] represents the current page -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$id"); ?>">
     <div class="user-details">
        <div class="input-box">
          <span class="details">User ID</span>
          <input type="text" name="userid" id="userid" value="<?php echo $row["userID"] ?>" required>
        </div>
        
        <div class="input-box">
           <span class="details">Username</span>
           <input type="text" name="name" id="name" value="<?php echo $row["userName"] ?>" required>
        </div>

        <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" id="password" value="<?php echo $row["pw"] ?>" required>
        </div>

        <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="em" id="em" value="<?php echo $row["email"]  ?>" required>
        </div>

        <!-- <div class="input-box">
            <span class="details">Role</span>
            <input type="text" name="role" id="role" value="<?php echo $row["admin"]  ?>" required>
        </div> -->
      </div>
        <div class="gender-details">
          <input type="radio" name="role" id="dot-1" value="0"<?php if ($row["admin"] ==="0") echo "checked" ?> required>
          <input type="radio" name="role" id="dot-2" value="1"<?php if ($row["admin"] ==="1") echo "checked" ?> required>
          <span class="gender-title">Role</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Member</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Author</span>
          </label>
        </div>
        
        <div class="button">
          <input type="submit" value="Register">
        </div>

        <button class="cancel" type="button" onclick="window.location.href='Management.php'">Cancel</button>
        
        
      
   
    </form>
  </div>
</div> 

</body>
</html>
