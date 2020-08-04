<?php
//this php file is used to manipulate database to change the motto of group
    include_once('dbConn.php');
    $group=$_POST['group'];
    $username=$_POST['username'];
    
    $motto=$_POST['new_motto'];
    if($username!=""&&$motto!=""&&$group!="")
    {
        $query="update group_info set motto='$motto' where group_id='$group'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_num_rows($result);
        header("Location:show_group.php?username=".$username."&group=".$group);
    }
    else
    {
        header("Location:show_group.php?username=".$username."&group=".$group."&event=empty");
    }
?>