<?php
$con=mysqli_connect("localhost","root","","login");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtmll/DTD/xhtmll-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    </head>
    <body>
    <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $q="select * from `videos` where id='$id'";
            $query=mysqli_query($con,$q);
            while($row=mysqli_fetch_assoc($query))
            {
                $name=$row['name'];
            }
            echo"You are watching ".$name."<br>";
            echo "<video width='500' height='300' controls><source src='videoupld/".$name."' type='video/webm'></video>";
        }
        else
        {
            echo "Error!!!";
        }
        ?>
    </body>
</html>