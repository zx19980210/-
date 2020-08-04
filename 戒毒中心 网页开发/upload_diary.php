<?php
    include_once('dbConn.php');
    $username=$_POST['username'];
    $content=$_POST['content'];
    
    if($username!=""&&$content!="")
    {
        $query="insert into diary(username,content,writeDate) values('$username','$content',CURRENT_DATE)";
        $result=mysqli_query($conn,$query);
        $row=mysqli_num_rows($result);
        header("Location:diary_choose.php?username=".$username);
    }
    else{
        header("Location:diary_write.php?username=".$username."&event=empty");
    }
?>