<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE>
<html>
    <head>
        
    <link href='http://fonts.googleapis.com/cssfamily=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
        
        #main
        {
            height:455px;
            background-color: white;
            margin-top:70px;
        }
        .output
        {
            background-color:white;
            box-shadow:0px 1px 1px #000;
            height: 250px;
            margin-bottom: 20px;
            overflow: scroll;
        }
        ul
        {
            list-style: none;
        }
        input[type=submit]
        {
            width: 100px;
            box-sizing: border-box;
            border:4px solid #;
        }
        textarea
        {
            background-color: #dcdcdc;
            width: 350px;
        }

        
        *{
            font-family:'Open Sans';
        box-sizing:border-box;
        }

        
    h3
        {
            text-align: center;
            font-size: 30px;
        }
        
        
        #p2
        {
            text-align: center;
            font-size: 30px;
        }
        
         #s1
        {
            text-align: center;
            font-size: 15px;
            width: 100px;
            height: 25px;
        }
        
         #s2
        {
            text-align: center;
            font-size: 15px;
            width: 100px;
            height: 25px;
        }
        
         #p3
        {
            text-align: center;
            font-size: 30px;
        }
        
        #main-wrapper
        {
            font-size: 20px;
            align-items: center;
        }
        
    .avatar
        {
          display: block;
  margin-left: auto;
  margin-right: auto;
 
        }
        

        .topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  color: white;
    text-shadow: 2px 2px ;
    
}
        .topnav {
  overflow: hidden;
  background-color: #333;
}
        img {
  border-radius: 50%;
}
  
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 16px 18px;
  text-decoration: none;
  font-size: 30px;
}
.topnav-right {
  float: right;
}
        </style>
    </head>
<body style="background-image: linear-gradient(to right, #ff5f6d, #ff7e5f);">
<div class="topnav">
<div class="topnav-right">
    <a href="web.php">Home</a>
     <a href="players.php">About</a>
    <a href="history1.php">History</a>
    <a href="update.php">Updates</a>
    <a href="web.php">Logout</a>
  </div>
    </div>
    <div id="main-wrapper">
    <h3 >Welcome
        <?php echo $_SESSION['username']?>
        </h3>
        <?php echo '<img class="avatar" width=250 height=250 src="'.$_SESSION['imglink'].'" >';?>
        
    <p id="p2">
    <a href="video.php">Videos</a><br/><br></p>
    <form method="post" enctype="multipart/form-data">
        <p id="p3">
    <input type="file" name="file" id="s1"/>
            <input type="submit" name="submit" value="Upload" id="s2"/></p>
        </form>
    </div>
        <?php
        //$con=mysqli_connect("localhost","root","","login");
        if(isset($_POST['submit']))
        {
            $name=$_FILES['file']['name'];
            $temp=$_FILES['file']['tmp_name'];
             //$directory='videoupld/';
            //$target_file=$directory.$name;
            //move_uploaded_file($temp,$target_file);
            move_uploaded_file($temp,'videoupld/'.$name);
            $q="INSERT INTO `videos` VALUES ('','$name')";
            
            if(mysqli_query($con,$q))
            {
                echo "Submited....";
            }
            echo "<br>".$name." has been uploaded....";
        }
        ?>
    
    
    <div id="main">
    <h2  style="background-color:#6495ed;color:white;">Write your views....</h2>
    <div class="output">
    <?php $sq1 ="SELECT * FROM posts";
        $result=$con->query($sq1);
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc())
            {
                
               echo $row['date'];
                echo "<br>";
                echo "" .$row["name"]. ":  ".$row["msg"]."<br>";
            
            }
        }
        else
        {
            echo "0 results";
        }
       // $con->close();
        ?>
    </div>
    <form method="post" action="send.php">
    <textarea name="msg" placeholder="Type to send message......" class="form-control"></textarea><br>
        <input type="submit" value="Send">
    </form>
    <br>
    <form action="">
    <input style="width: 100%;background-color: #6495ed;color:white;font-size:20px;">
        
    </form>
    </div>
    </body>
</html>