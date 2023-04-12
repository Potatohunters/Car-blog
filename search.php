<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search1.css" type="text/css" charset="utf-8"/>
    <title>Document</title>
</head>
<style>
    .error{
        align-content:center;
        color:white;
    }
</style>
<body>

 <nav class="navbar">   
    <div class="logo">
        <h4>Hyper</h4>
    </div>
    
    <ul class="nav-links">
        <li><a href="Home.php" class="links">home</a></li>
        <li><a href="Archive.html" class="links">archive</a></li>
        <li><a href="About.html" class="links">about</a></li>
        <li><a href="Create.html" class="links">create</a></li>
        <li><a href="login1.html" class="links">Login</a></li>
    </ul>

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>   
 </nav>

 <section class="blog-section">
<?php
    require "dbconn.php";


      $keywords=$_POST['keywords'];
	  $sql="SELECT * from postinfo where Tag like '%".$keywords."%'";
	  if($result=mysqli_query($conn,$sql))
      { 
        $row=mysqli_fetch_row($result);
        if(empty($row)){
        echo"<h1 class=\"error\">Sorry we can't find the search results.</h1>"; 
        }
        while ($row=mysqli_fetch_row($result))
        {
        // echo"<section class=\"blog-section\">";
        echo"<div class='blog-card'>";       
        echo"<img src='picture/car-1.jpg' alt='' class='blog-image'> ";
        echo"<h1 class=\"blog-title\">$row[1]</h1>";  
        echo"<p class='blog-date'>{$row[2]}</p>";
        echo"<p class=\"blog-date\">{$row[6]}</p>";
        echo"<li class=\"blog-tag\">{$row[3]}</li>";
        echo"<p class=\"blog-overview\">{$row[4]}</p>";
        echo"</div>";
        }
        mysqli_free_result($result);
    }
    //   return $result->fetch_assoc();
    // }
?>
<?php 
    // if(empty($row)){
    //     echo"<h1 class=\"error\">Sorry we cannot find.</h1>";
    // }

    
    // echo"<section class=\"blog-section\">";
    
    // echo"<div class='blog-card'>";
    // echo"<img src='picture/car-1.jpg' alt='' class='blog-image'> ";
    // echo"<h1 class=\"blog-title\">{$row['title']}</h1>";  
    // echo"<p class='blog-date'>{$row['author']}</p>";
    // echo"<p class=\"blog-date\">{$row['date']}</p>";
    // echo"<li class=\"blog-tag\">{$row['tag']}</li>";
    // echo"<p class=\"blog-overview\">{$row['content']}</p>";
    // echo"</div>";
 
?>
   

</body>
</html>
