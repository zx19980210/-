<!DOCTYPE html>
<html>
<!-- this page is for showing basic information of the logged residence-->
<head>
<?php
                //after a time period defined by lifetime, user have to login again in order to ensure security
                $lifetime=600;
                $username=$_GET['username'];
                session_start();
                if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
                {
                    include_once('dbConn.php');
                    
                    //if new avatar is set, change corresponding data in database first
                    if(isset($_GET['new_avatar']))
                    {
                        $new_avatar=$_GET['new_avatar'];
                        $sql4="UPDATE r_profile SET avatar='$new_avatar' where username='$username'";
                        mysqli_query($conn,$sql4);
                    }
                    //find information of the login user
                    $sql1="SELECT * from r_profile where username='$username'";
                    //find information of god father or god mather
                    $sql2="SELECT b.firstname,b.lastname,b.avatar FROM r_profile b left join r_profile a on a.godFather=b.username where a.username='$username'";
                    
                    //sql3 to sql5 find the amount of finished tasks in each step
                    $sql3="SELECT count(*) as count from task_info where username='$username' and step=1 and deleted=0";
                    $sql4="SELECT count(*) as count from task_info where username='$username' and step=2 and deleted=0";
                    $sql5="SELECT count(*) as count from task_info where username='$username' and step=3 and deleted=0";
                    //sql6 to sql8 find the total amount of tasks in each step
                    $sql6="SELECT count(*) as count from tasks_description where step=1";
                    $sql7="SELECT count(*) as count from tasks_description where step=2";
                    $sql8="SELECT count(*) as count from tasks_description where step=3";
                    $result1 = mysqli_query($conn, $sql1);
                    $result2 = mysqli_query($conn, $sql2);
                    $result3 = mysqli_query($conn, $sql3);
                    $result4 = mysqli_query($conn, $sql4);
                    $result5 = mysqli_query($conn, $sql5);
                    $result6 = mysqli_query($conn, $sql6);
                    $result7 = mysqli_query($conn, $sql7);
                    $result8 = mysqli_query($conn, $sql8);
                    $row1 = mysqli_fetch_assoc($result1);
                    $row2 = mysqli_fetch_assoc($result2);
                    $finished_task_of_step1 = mysqli_fetch_assoc($result3);
                    $finished_task_of_step2 = mysqli_fetch_assoc($result4);
                    $finished_task_of_step3 = mysqli_fetch_assoc($result5);
                    $total_task_of_step1 = mysqli_fetch_assoc($result6);
                    $total_task_of_step2 = mysqli_fetch_assoc($result7);
                    $total_task_of_step3 = mysqli_fetch_assoc($result8);
                    //calculate progress of each step
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

        
<style>
    .grid{
        display: grid;
        width: 1500px;
        height: 700px;
        grid-template-columns: 33% 0.3% 55%;
        grid-column-gap:5%;
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
        grid-template-columns: 45% 45%;
        grid-template-rows: 200px 200px 200px;
        grid-column-gap: 7%;
        grid-row-gap: 20px;
        text-align: center;
        margin-left: 15px;
        margin-top: 35px;
    }

    .progressGrid{
        text-align: center;
    }

    .functionGrid{
        border: solid rgb(130, 162, 173);
        border-width: 3px;
        border-radius: 20px;
    }

    .profileAvatar{
        width: 190px;
        height: 210px;
        /*border:solid rgb(130, 162, 173);*/
        border-radius: 50%;
        border-width: 5px;
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
        margin-left: 10px;
        margin-right: 10px;
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
<header>
	<title>Profile</title>
</header>
<body>
    <div class="grid">
        <div class="leftGrid">
            
            <div> 
                <a href="login.php"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                <center><a href="avatar_choose.php?username=<?php echo $username?>"><img src=<?php echo "avatars/",$row1['avatar'],".png"?> class="profileAvatar" id="avatar" style="margin-top: -35px;"></a></center>
                <p class="textStyle"><?php echo $row1['firstname']," ",$row1['lastname']?> </p>

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

        <div class="rightGrid" >
            <div class="functionGrid">
                <a href="other_profile.php?username=<?php echo $username?>"><img src=<?php echo "avatars/",$row2['avatar'],".png"?> class="smallAvatar"></a>
                <p class="textStyle"><?php echo $row2['firstname']," ",$row2['lastname']?></p>
            </div>

            <div class="functionGrid">
                <a href="therapy.php?username=<?php echo $username?>"><img src="icons/Therapy.png" class="smallIcon"></a>
                <p class="textStyle">Therapie</p>
            </div>

            <div class="functionGrid">
                <a href="appointment.php?username=<?php echo $username?>"><img src="icons/doctor.png" class="smallIcon"></a>
                <p class="textStyle">Doktersafspraken</p>
            </div>

            <div class="functionGrid">
                <a href="show_group.php?username=<?php echo $username?>&group=<?php echo $row1['groups']?>"><img src="icons/groups.png" class="smallIcon"></a>
                <p class="textStyle">Groepen</p>
            </div>

            <div class="functionGrid">
                <a href="yellow_card.php?username=<?php echo $username?>"><img src="icons/yellowCard.png" class="smallIcon"></a>
                <p class="textStyle">Gele kaarten</p>
            </div>

            <div class="functionGrid">
                <a href="diary_choose.php?username=<?php echo $username?>"><img src="icons/diary.png" class="smallIcon"></a>
                <p class="textStyle">Dagboek</p>
            </div>
            
        </div>
    </div>
</body>

</head>
</html>