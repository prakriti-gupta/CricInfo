<?php
session_start();
require 'dbconfig/config.php';
?>
<html>
    
    <head>
        
         <script type="text/javascript">
        function PreviewImage()
             {
                 var oFReader = new FileReader();
                 oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
                 oFReader.onload=function(oFREvent)
                 {
                     document.getElementById("uploadPreview").src=oFREvent.target.result;
                 };
             };
        </script>
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
            height:500px;
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
            padding: 25px 8px;
            margin:0;
            padding 0 0 20px;
            text-align: center;
            font-size: 32px;
            font-style:italic;
        }
        .loginbox p{
            margin:0;
            padding:0;
            font-weight:bold;
            font-size:15px;
        }
        .loginbox input{
            width:100%;
            margin-bottom:18px;
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
        <img src="logo.jpg" class="avatar" id="uploadPreview"/>
    <h1>SignUp</h1>
        <form class="myform" action="Signup.php" method="post" enctype="multipart/form-data">
        <p>Username</p>
            <input type="text" name="username" placeholder="Enter username" required />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter password" required />
            <p>Check Password</p>
            <input type="password" name="cpassword" placeholder="Enter password again" required />
        
            <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
            <input type="submit" value="SignUp" name="submit_btn" id="signup_btn">
            
        </form>
        <?php
        if(isset($_POST['submit_btn']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            
             $img_name=$_FILES['imglink']['name'];
             $img_size=$_FILES['imglink']['size'];
             $img_tmp=$_FILES['imglink']['tmp_name'];
            
            $directory='uploads/';
            $target_file=$directory.$img_name;
            
            if($password==$cpassword)
            {
                $query="select * from user WHERE username='$username'";
                $query_run = mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    //there is already a user with the same username
                    echo '<script type="text/javascript"> alert("User already exist...try another username") </script>';
                    
                }
                else if(file_exists($target_file))
                {
                   echo '<script type="text/javascript"> alert("Image file already exist...try another Image") </script>';  
                }
                else if($img_size>2097152)
                {
                     echo '<script type="text/javascript"> alert("Image file size larger than 2MB ....try another Image") </script>';
                }
                else
                {
                    move_uploaded_file($img_tmp,$target_file);
                    $query="insert into user values('$username','$password','$target_file')";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                       
                         echo '<script type="text/javascript"> alert("User Registered.....Go to login page to get logged in") </script>';
                          header('location:login.php');
                    
                
                    }
                    else
                    {
                         echo '<script type="text/javascript"> alert("Error!") </script>';
                        
                    }
                }
            }
            else
            {
                 echo '<script type="text/javascript"> alert("Password and Confirm Password doesnot match.....") </script>';
                    }
            }
        
        
        ?>
        
    </div>
    </body>
</html>