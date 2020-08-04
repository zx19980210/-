<!DOCTYPE html>
<html>
<head>
<!-- this page show basic informations of other residence except for the logged residence -->
<style>
    .grid{
        display: grid;
        width: 1500px;
        height: 700px;
        grid-template-columns: 55% 0.3% 43%;
        grid-column-gap: 3px;
        margin-left: auto;
        margin-right: auto;
    }

    .leftGrid{
        display: grid;
        grid-template-rows: 300px 105px 105px 105px;
        width: 100%;
        grid-row-gap: 15px;
        margin-left: 10px;
        margin-top: 20px;
    }

    .rightGrid{
        display: grid;
        grid-template-rows: 200px 200px 200px;
        grid-column-gap: 5%;
        grid-row-gap: 15px;
        text-align: center;
        margin-left: 100px;
        margin-right:100px;
        margin-top: 35px;
    }

    .progressGrid{
        text-align: center;
    }

    .functionGrid{
        border: solid rgb(130, 162, 173);
        border-width: 3px;
        border-radius: 2%;
    }

    .largeAvatar{
        width: 190px;
        height: 210px;
        border-radius: 50%;
        border-width: 5px;
        margin-top: -50px;
    }

    .smallAvatar{
        width: 90px;
        height: 90px;
        margin-top: 10px;
        border-radius: 50%;
    }

    .smallIcon{
        width: 90px;
        height: 90px;
        margin-top: 10px;
    }

    .textStyle{
        margin-top: 15px;
        font-size: xx-large;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        text-align: center;
    }

    .backArrow{
        width: 50px;
        height: 50px;
        position:relative;
        left:10px;
        top:10px;
        
    }

    .progressBar{
        background-color:rgb(233, 244, 247);
        border:solid rgb(105, 131, 138);
        border-width: 3px;
        margin-top: -40px;
        margin-left: 100px;
        margin-right: 100px;
        border-radius: 2px;
    }

    .progress{
        background-color:rgb(130, 162, 173);
        width: 0%;
        height: 13px;
        align-self: start;
        animation:showProgress 1s ease-in;
    }

    @keyframes showProgress
    {
        0%{
            width: 0%;
        }
    
    }

</style>

<body>
    <div class="grid">
        <div class="leftGrid">

            <?php
            $username=$_GET['username'];
            $lifetime=600;
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {
                include_once('dbConn.php');
                $sql1="SELECT godFather from r_profile where username='$username'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                if(isset($_GET['g_username']))
                    {
                        $g_username=$_GET['g_username'];
                    }
                else
                    {
                        $g_username=$row1['godFather'];
                    }
                $sql2="SELECT b.firstname,b.lastname,b.avatar FROM r_profile a left join r_profile b on a.godFather=b.username where a.username='$g_username'";
                $sql4="SELECT * from r_profile where username='$g_username' and deleted=0";
                $sql5="SELECT count(*) as count from task_info where username='$g_username' and step=1 and deleted=0";
                $sql6="SELECT count(*) as count from task_info where username='$g_username' and step=2 and deleted=0";
                $sql7="SELECT count(*) as count from task_info where username='$g_username' and step=3 and deleted=0";
                $sql8="SELECT count(*) as count from tasks_description where step=1";
                $sql9="SELECT count(*) as count from tasks_description where step=2";
                $sql10="SELECT count(*) as count from tasks_description where step=3";
                $result2 = mysqli_query($conn, $sql2);
                $result4 = mysqli_query($conn, $sql4);
                $result5 = mysqli_query($conn, $sql5);
                $result6 = mysqli_query($conn, $sql6);
                $result7 = mysqli_query($conn, $sql7);
                $result8 = mysqli_query($conn, $sql8);
                $result9 = mysqli_query($conn, $sql9);
                $result10 = mysqli_query($conn, $sql10);
                $row2 = mysqli_fetch_assoc($result2);
                $row4 = mysqli_fetch_assoc($result4);
                $finished_task_of_step1 = mysqli_fetch_assoc($result5);
                $finished_task_of_step2 = mysqli_fetch_assoc($result6);
                $finished_task_of_step3 = mysqli_fetch_assoc($result7);
                $total_task_of_step1 = mysqli_fetch_assoc($result8);
                $total_task_of_step2 = mysqli_fetch_assoc($result9);
                $total_task_of_step3 = mysqli_fetch_assoc($result10);
                $progress_step1=($finished_task_of_step1['count']/$total_task_of_step1['count'])*100;
                $progress_step2=($finished_task_of_step2['count']/$total_task_of_step2['count'])*100;
                $progress_step3=($finished_task_of_step3['count']/$total_task_of_step3['count'])*100;
            }
            else{
                session_unset();
                session_destroy();
                header("Location:login.php?event=invalid");
            }
            ?>

            <div> 
                <a href="javascript:history.go(-1)"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                <br>
                <center><img src=<?php echo "avatars/",$row4['avatar'],".png"?> class="largeAvatar" ></center>
                <p class="textStyle"><?php echo $row4['firstname']," ",$row4['lastname'] ?></p>
            </div>
            <div class="progressGrid">
                <p class="textStyle">Stap 1</p></br>
                <div class="progressBar">
                    <div class="progress" style="width:<?php echo $progress_step1,"%"?>" >
                    </div>
                </div>
                
            </div>
            <div class="progressGrid">
                <p class="textStyle">Stap 2</p></br>
                <div class="progressBar">
                    <div class="progress" style="width:<?php echo $progress_step2,"%"?>" >
                    </div>
                </div>
            </div>
            <div class="progressGrid">
                <p class="textStyle">Stap 3</p></br>
                <div class="progressBar">
                    <div class="progress" style="width:<?php echo $progress_step3,"%"?>">
                    </div>
                </div>
            </div>
        </div>
    
    <div style="background-color:rgb(130, 162, 173) ; margin-top: 20px;height: 660px;">
        
    </div>
        

        <div class="rightGrid">
            <div class="functionGrid">
                <img src="icons/birthdayCake.png" class="smallIcon">
                <p class="textStyle"><?php echo $row4['birthday'] ?></p>
            </div>
            <div class="functionGrid">
                <img src="icons/calendar.png" class="smallIcon">
                <p class="textStyle">Begonnon op <?php echo $row4['joinDate'] ?></p>
            </div>
            <div class="functionGrid">
                <img src=<?php echo "avatars/",$row2['avatar'],".png"?> class="smallAvatar">
                <p class="textStyle">Nonkel van <i><?php echo $row2['firstname']," ",$row2['lastname'] ?></i></p>
            </div>
            
        </div>
    </div>
</body>

</head>
</html>