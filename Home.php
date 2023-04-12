
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <meta name="author" content="Cai Yuheng    Li Haocheng   Lin Yilin    Liu Jiahao">
    <link rel="stylesheet" href="Home.css" type="text/css" charset="utf-8"/>
</head>
<style>
    .searchform{
       border-radius:5px; 
    }

    .btn{
    padding: 5px 10px;
    border-radius: 10px;
    text-decoration: none;
    background: rgba(206, 205, 205, 0.7);
    color: #000;
    text-transform: capitalize;
    font-weight: bolder;
    transition: background-color 0.4s,color 0.4s;
    }

    .btn:hover{
    background: rgb(68, 68, 64);
    color:rgba(255, 255, 255, 0.7);
    letter-spacing: 1px;
    }
    
    .infor{
        border-radius:10px;
        padding:10px;
        background-color:rgb(68, 67, 67);
        
    }
    input::-webkit-input-placeholder{
        color:rgb(207, 221, 101);
        font-size: 15px;
    }
</style>
<body> 
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div> 
 <nav class="navbar">   
    <div class="logo">
        <h4>Hyper</h4>
    </div>
    <!--Dark/light theme switch button-->
    <div class="container">
        <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
        </label>  
     </div>

    <ul class="nav-links">
        <li><a href="Home.html" class="links">home</a></li>
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

<!--Head section-->
    
 <header class="head">
  
    <div class="content">
        <h1 class="heading">
            <span class="small">welcome to the home of</span>
            
            <span class="no-fill">hypercar</span>
        </h1> 

           <!-- <h1 class="search">Search</h1> -->
           <form class="searchform" action="search.php" method="Post">
		   <td><input class="infor" type="text" name="keywords" placeholder="What do you want to search" required></td>
		   <td><input type="submit" value="Search" class="btn"></td>
	       </form>
	       
        
            <!-- <a href="login1.html" class="btn">Login</a> -->
    </div>
 </header>
 

 <!--blog section-->
 <section class="blog-section">
<?php
    require "dbconn.php";
    $num=0;

    $row = select();

    function select()
    {
      global $conn;
      global $id;
      global $num;
      $fh = mysqli_query($conn,"SELECT MAX(postID) from postinfo");
      $c_echo = mysqli_fetch_array($fh);
      $id = number_format($c_echo['MAX(postID)'],0);
      $id=$id-$num;
      $num++;
      $sql = "SELECT * FROM postinfo WHERE postID=$id;";
      $result =$conn->query($sql);
      return $result->fetch_assoc();
    }

    

?>

    <div class="blog-card">
        <img src="picture/car-1.jpg" alt="" class="blog-image"> 
        <h1 class="blog-title"><?php echo $row['title']?></h1>
        <p class="blog-date"><?php echo $row['author']?></p>
        <p class="blog-date">&#8212 <?php echo $row['date']?></p>
        <li class="blog-tag"><?php echo $row['tag']?></li>
        <!-- <li class="blog-tag">Apollo</li> -->
        <p class="blog-overview"><?php echo $row['content']?></p>
        <!-- <a href="/" class="btn dark">Review and rating</a> -->
        <?php echo"<button class=\"btn dark\" onclick=\"window.location.href='review.php?id=" . $row["postID"] . "'\">Review and rating</button>";?>  
    </div>
    
    
    <?php
    $row = select();
    ?>
    <div class="blog-card">
        <img src="picture/car-2.jpg" alt="" class="blog-image"> 
        <h1 class="blog-title"><?php echo $row['title']?></h1>
        <p class="blog-date"><?php echo $row['author']?></p>
        <p class="blog-date">&#8212 <?php echo $row['date']?></p>
        <li class="blog-tag"><?php echo $row['tag']?></li>
        <!-- <li class="blog-tag">McLaren</li> -->
        <p class="blog-overview"><?php echo $row['content']?></p>
        <a href="/" class="btn dark">Read more</a>
    </div>

    <?php
    $row = select();
    ?>
    <div class="blog-card">
        <img src="picture/car-3.webp" alt="" class="blog-image"> 
        <h1 class="blog-title"><?php echo $row['title']?></h1>
        <p class="blog-date"><?php echo $row['author']?></p>
        <p class="blog-date">&#8212 <?php echo $row['date']?></p>
        <li class="blog-tag"><?php echo $row['tag']?></li>
        <!-- <li class="blog-tag">McLaren</li> -->
        <p class="blog-overview"><?php echo $row['content']?></p>

        <a href="/" class="btn dark">Read more</a>
    </div>
    

    <?php

    $row = select();
    
    ?>
    <div class="blog-card">
        <img src="picture/car-4.webp" alt="" class="blog-image"> 
        <h1 class="blog-title"><?php echo $row['title']?></h1>
        <p class="blog-date"><?php echo $row['author']?></p>
        <p class="blog-date">&#8212 <?php echo $row['date']?></p>
        <li class="blog-tag"><?php echo $row['tag']?></li>
        <!-- <li class="blog-tag">McLaren</li> -->
        <p class="blog-overview"><?php echo $row['content']?></p>
        <a href="/" class="btn dark">Read more</a>
     </div>

    
 </section>

 <section class="end">
    <div class="last-text">
        <p>Cai Yuheng&nbsp;&nbsp;&nbsp;&nbsp;Li Haocheng&nbsp;&nbsp;&nbsp;&nbsp;Lin Yilin&nbsp;&nbsp;&nbsp;&nbsp;Liu Jiahao</p>   
    </div>
</section>
    
<script src="Home.js"></script>
    
</body>
</html>