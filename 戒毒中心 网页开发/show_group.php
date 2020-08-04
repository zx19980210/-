<!DOCTYPE html>
<html>
<!-- this page shows group number, group members, and group quote -->
<?php
            $username=$_GET['username'];
            $group=$_GET['group'];
            $lifetime=600;
            session_start();
            include_once('dbConn.php');
            $sql2="SELECT groups from r_profile where username='$username'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime&&($group==$row2['groups']))
            {
                
                //get information of all group members in this group
                $sql1="SELECT * from r_profile where groups='$group' and deleted=0";
                $result1 = mysqli_query($conn, $sql1);
                $sql3="SELECT motto from group_info where group_id='$group'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);

                $avatars=array();
                $firstname=array();
                $lastname=array();
                $usernames=array();
                $length=$result1->num_rows;
                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $avatars[]=$row1['avatar'];
                       $firstname[]=$row1['firstname'];
                       $lastname[]=$row1['lastname'];
                       $usernames[]=$row1['username'];
                    }
                }         
            }
            else{
                session_unset();
                session_destroy();
                header("Location:login.php?event=invalid");
            }
            
        ?>   
<script>
         function init()
            {
                
                var member_amount=<?php echo $length?>;
                var login_username="<?php echo $username?>";
                var member_avatar=<?php echo json_encode($avatars)?>;
                var member_firstname=<?php echo json_encode($firstname)?>;
                var member_lastname=<?php echo json_encode($lastname)?>;
                var member_username=<?php echo json_encode($usernames)?>;
                
                for(var i=0;i<member_amount;i++)
                {
                    
                    var valid_p='p'+i;
                    var valid_avatar='avatar'+i;
                    var valid_link='link'+i;
                    var p=document.getElementById(valid_p);
                    var avatar=document.getElementById(valid_avatar);
                    var avatar_src='avatars/'+member_avatar[i]+'.png';
                    var firstname=member_firstname[i];
                    var lastname=member_lastname[i];
                    avatar.setAttribute("src",avatar_src);
                    avatar.setAttribute("class","avatar_visible");
                    
                    p.innerText=firstname+" "+lastname;
                    
                    
                    var url;
                    if(login_username==member_username[i])
                    {
                        url='patient_profile.php?username='+login_username;
                    }
                    else{
                        url='other_profile.php?username='+login_username+'&g_username='+member_username[i];
                    }
                    document.getElementById(valid_link).setAttribute("href",url);
                    
                }
                
            }
            
        function edit_group_motto()
        {
            document.getElementById("confirm_edit").setAttribute("style","visibility:visible");
            document.getElementById("new_motto").setAttribute("style","visibility:visible");
        }

        
    </script> 
<head>
    <style>
        .grid{
        display: grid;
        width: 1500px;
        height: 700px;
        grid-template-columns: 16% 64% 16%;
        grid-column-gap:2%;
        margin-left: auto;
        margin-right: auto;
        
    }

    .leftSideGrid{
        display:grid;
        width: 100%;
        margin-top: 5px;
        /*background-color:rgb(176, 220, 232);*/
        background-color:rgb(196, 229, 238);
    }

    .rightSideGrid{
        display:grid;
        width: 100%;
        margin-top: 5px;
        /*background-color:rgb(176, 220, 232);*/
        background-color:rgb(196, 229, 238);
    }

    .middleGrid{
        display: grid;
        grid-template-rows: 18% 10% 10% 60%;
        width: 100%;
    }

    .headerGrid{
      
    }

    .groupIcon{
        height:100px;
        width:262px;
        margin-top:15px;
    }

    .backArrow{
        width: 50px;
        height: 50px;
        position:relative;
        left:5px;
        top:5px;
    }

    .test{
        height:100%;
        width:100%;
    }

    .text{
        font-size: xx-large;
        font-family:Arial,sans-serif;
        font-weight: bold;
        text-align:center;
        margin-top:10px;
        color: rgb(105, 131, 138);
    }

    .motto{
        font-size: x-large;
        font-family:Trebuchet MS,sans-serif;
        text-align:center;
        margin-top:20px;
        color: rgb(105, 131, 138);
    }

    .groupMemberGrid{
        display:grid;
        grid-template-columns: 24% 24% 24% 24%;
        grid-column-gap:1.3%;
        
    }

    .avatar_visible{
        width: 200px;
        height: 220px;
    }

    .avatar_invisible{
        width: 200px;
        height: 220px;
        visibility:hidden;
    }

    .name{
        font-size: x-large;
        font-family:Arial,sans-serif;
        text-align:center;
        font-weight: bold;
        margin-top:5px;
        color: black;
    }

    .member_div{
        width:100%;
        margin-top:80px;
    }

    .buttonStyle{
        width: 80px;
        height: 35px;
        border: solid rgb(105, 131, 138);
        border-width: 2px;
        border-radius: 5px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        font-size: large;
        color: rgb(105, 131, 138);
     }

     .inputStyle{
        width: 500px;
        height: 30px;
        border: solid rgb(105, 131, 138);
        border-width: 2px;
        border-radius: 5px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: large;
        outline:none;
        }
    </style>

<header>
		<title>My group</title>
	</header>

    <body onload="init()">

        <?php
                $event='none';
                if(isset($_GET['event']))
                {
                    $event=$_GET['event'];
                }

                if($event=='empty')
                {
                    echo "<script>alert('Please enter new quote')</script>";
                }
            
            ?>
            <div class="grid">
                <div class="leftSideGrid">
                    <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow_white.png" class="backArrow"></a>       
                </div>
                <div class="middleGrid">
                    <div >
                        <center><img src="icons/color_group.png" class="groupIcon" ></center>
                    </div>

                    <div class="test">
                        <p class="text"><?php echo "Group ",$group?></p>
                    </div>

                    <!-- every members in this group can change the motto-->
                    <!-- form is used to transfer data to page edit_motto.php -->
                    <form action="edit_motto.php" method="post" name="edit_motto">
                    <div class="test" >
                        <p class="motto" title="Edit group motto" id="motto" name="motto" onClick="edit_group_motto()"><?php echo $row3['motto']?></p>
                        <center>
                            <input type = "text" name="new_motto" id = "new_motto" value = "" class="inputStyle" style="visibility:hidden">
                            <input type="submit" value="confirm" id="confirm_edit" class="buttonStyle" style="visibility:hidden">
                        </center>
                        <input type="hidden" name="username" value=<?php echo $username?>>
                        <input type="hidden" name="group" value=<?php echo $group?>>
                    </div>
                    </form>

                    <div class="groupMemberGrid">
                        <div class="member_div">
                            <a href="" id="link0"><center><img src="" id="avatar0" class="avatar_invisible"></center></a><br>
                            <center><p class="name" id="p0"></p></center>
                        </div>

                        <div class="member_div">
                            <a href="" id="link1"><center><img src="" id="avatar1" class="avatar_invisible"></center></a><br>
                            <center><p class="name" id="p1"></p></center>
                        </div>

                        <div class="member_div">
                            <a href="" id="link2"><center><img src="" id="avatar2" class="avatar_invisible"></center></a><br>
                            <center><p class="name" id="p2"></p></center>
                        </div>

                        <div class="member_div">
                            <a href="" id="link3"><center><img src="" id="avatar3" class="avatar_invisible"></center></a><br>
                            <center><p class="name" id="p3"></p></center>
                        </div>
                    </div>

                </div>
                <div class="rightSideGrid"></div>
            </div>

    </body>
</head>



</html>