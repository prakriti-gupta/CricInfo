<?php
session_start();
require 'dbconfig/config.php';
?>
<html>
    <head>
       
    <style type="text/css">
        body{
            margin:0;
            padding:0;
            background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(KyleField.jpg);
            background-size: cover;
            background-position: center;
            font-family:sans-serif;
        }
        .loginbox{
            width:360px;
            height:470px;
            background: #000;
            color:#fff;
            top:50%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
            box-sizing:border-box;
            padding: 50px 20px;
        }
        .avatar{
            width:100px;
            height:100px;
            border-radius:50%;
            position: absolute;
            top: -50px;
            left:calc(50% - 50px);
        }
        h1
        {
            padding: 40px 20px;
            margin:0;
            padding 0 0 20px;
            text-align: center;
            font-size: 35px;
            font-style:italic;
        }
        .loginbox p{
            margin:0;
            padding:0;
            font-weight:bold;
            font-size:17px;
        }
        .loginbox input{
            width:100%;
            margin-bottom:20px;
        }
        .loginbox input[type="text"],input[type="password"]
        {
            border:none;
            border bottom: 1px solid #fff;
            background: transparent;
            height:40px;
            outline:none;
            color:#fff;
            font-size:16px;
        }
        .loginbox input[type="submit"]
        {
            border:none;
            outline:none;
            height:40px;
            background:#fb2525;
            color:#fff;
            font-size:27px;
            border-radius:20px;
        }
        .loginbox input[type="submit"]:hover{
            cursor:pointer;
            background:#ffc187;
            color:#000;
        }
        
        </style>
    </head>
<body>
    <div class="loginbox">
        <img src="logo.jpg" class="avatar">
    <h1>Login Here</h1>
        <form class="myform" action="Login.php" method="post">
        <p>Username</p>
            <input type="text" name="username" class="inputvalues" placeholder="Enter username"/>
            <p>Password</p>
            <input type="password" name="password" class="inputvalues" placeholder="Enter password"/>
        <input type="submit" value="Login" name="login" id="login_btn"/>
         </form>
        <?php
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query="select * from user WHERE username ='$username' AND password ='$password'";
            $query_run=mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0)
            {
                $row=mysqli_fetch_assoc($query_run);
                $_SESSION['username']=$row['username'];
                $_SESSION['imglink']=$row['imglink'];
                header('location:homepage.php');
            }
            else
            {
                echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
            }
        }
        ?>
    </div>
    </body>
</html>