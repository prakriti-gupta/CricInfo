<?php
$con=mysqli_connect("localhost","root","","login");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
    <style type="text/css">
        body{
 background-color: gainsboro;
    height:100vh;
    background-size:cover;
    background-position:center;
        }
        
    #a2 {
  margin-left:1600px;
     margin-top: 1px;
  font-size: 40px;
     position: fixed;
     text-decoration: none;
     color:black;
       }
    </style>
    </head>
    <body>
          <a href="homepage.php" id="a2">&#9776;</a>
    <?php
        $q="select * from `videos`";
        $query=mysqli_query($con,$q);
        while($row=mysqli_fetch_assoc($query))
        {
            $id=$row['id'];
            $name=$row['name'];
            echo "<a href='watch.php?id=$id'>$name</a><br>";
        }
        ?>
        
    </body>
</html>