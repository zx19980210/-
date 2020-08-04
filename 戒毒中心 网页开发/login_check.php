<?php
    //login_check.php page checks the username and password transferred from login.php
    
    //save username and login time in session
    session_regenerate_id(true);
    session_start();
    include_once('dbConn.php');
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username!=""&&$password!="")
    {
        //find password saved in database and jump to different pages based on different cases
        $query="select password from login_info where username='$username';";
        $result=mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $result_password=$row['password'];
        //password in the database is encrypted
        if(password_verify($password, $result_password))
        {
            $_SESSION["user"]=$username;
            $_SESSION["created"]=time();
            header("Location:patient_profile.php?username=".$username);
            
        }
        else
        {
            header("Location:login.php?event=wrong");
        }
    }
    else
    {
        header("Location:login.php?event=empty");
    }
?>