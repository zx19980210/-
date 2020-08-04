<?php

    //Do specific action based on data received from change_password.php
    include_once('dbConn.php');
    $username=$_POST['username'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    if($username!=""&&$old_password!=""&&$new_password!=""&&$confirm_password!="")
    {
        if(strlen($new_password)>15||strlen($confirm_password)>15)
        {
            header("Location:change_password.php?event=length_error");
        }
        else{
            if($new_password==$confirm_password)
            {
                $query1="select password from login_info where username='$username';";
                $result1=mysqli_query($conn,$query1);
                $row = mysqli_fetch_assoc($result1);
                $result_password=$row['password'];
                if(password_verify($old_password, $result_password))
                {
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query2="UPDATE login_info set password='$new_password' where username='$username'";
                    mysqli_query($conn,$query2);
                    header("Location:login.php?event=success");
                    
                }

                else
                {
                    //original password or username is wrong
                    header("Location:change_password.php?event=origin_error");
                }
            }
            else
            {
                //new password and confirmed password are inconsistent
                header("Location:change_password.php?event=match_error");
            }
        }
    }
    else
    {
        //information required for changing password is incompleted
        header("Location:change_password.php?event=empty");
    }
?>