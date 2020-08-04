<!DOCTYPE html>
<html>
<!-- this page is designed for residences to change their avatars -->
<?php
            $username=$_GET['username'];
            $lifetime=600;
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {
                include_once('dbConn.php');
                //select information of the logged residence
                $sql1="SELECT * from r_profile where username='$username' and deleted=0";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                
                //find all selected avatars
                $sql2="SELECT distinct avatar from r_profile";
                $result2=mysqli_query($conn,$sql2);
                $avatars=array();
                $length=$result2->num_rows;
                if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                       $avatars[]=$row2['avatar'];
                    }
                }             
            }
            else{
                session_unset();
                session_destroy();
                header("Location:login.php?event=invalid");
            }
            
        ?>

    <script  type='text/javascript'>
        var current_avatar=document.getElementById("current_avatar");
        var new_avatar_id=current_avatar.src.substring(current_avatar.src.indexOf("avatars/")+8,current_avatar.src.indexOf(".png"));

        //this function is called when user click available avatar for selecting
        function choose_avatar(clicked_id)
        {
            var clicked_avatar=document.getElementById(clicked_id);
            var unavailable='unavailable_avatar';
            //give an alert when the selected avatar is unavailable
            if(clicked_avatar.getAttribute("class")==unavailable)
            {
                alert("Gray avatars are unavailable,please select another one");
            }

            //otherwise selected avatar would become gray and the original avatar would be colorful again
            else{
                clicked_avatar.setAttribute("class","unavailable_avatar");
                var current_avatar=document.getElementById("current_avatar");
                var old_avatar_number=current_avatar.src.substring(current_avatar.src.indexOf("avatars/")+8,current_avatar.src.indexOf(".png"));
                var old_avatar_id='avatar_'+old_avatar_number;
                document.getElementById(old_avatar_id).setAttribute("class","available_avatar");
                current_avatar.src=clicked_avatar.src;
            }
        }

        //function init() is used to change color of all unavailable avatars that have been selected to be grey
        function init()
        {
            var length=<?php echo $length?>;
            var unavailable_avatar=<?php echo json_encode($avatars)?>;
            for(var i=0;i<length;i++)
            {
                var selected_avatar='avatar_'+unavailable_avatar[i];
                document.getElementById(selected_avatar).setAttribute("class","unavailable_avatar");
            }
        }

        function get_current_avatar_id()
        {
            var current_avatar=document.getElementById("current_avatar");
            var new_id=current_avatar.src.substring(current_avatar.src.indexOf("avatars/")+8,current_avatar.src.indexOf(".png"));
            return new_id;
        }

        //change the link on the submit button based on current avatar id.
        function change_avatar()
        {
            var new_id=get_current_avatar_id();
            //the manipulation on database is performed in patient_profile page.
            var url="patient_profile.php?username="+"<?php echo $username?>"+"&new_avatar="+new_id;
            document.getElementById("link").setAttribute("href",url);
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
       /* background-image:linear-gradient(to right,rgb(176, 220, 232,1),rgb(176, 220, 232,0));*/
        background-color:rgb(196, 229, 238);
    }

    .rightSideGrid{
        display:grid;
        width: 100%;
        grid-template-columns:20% 20% 20% 20% 20%;
        margin-top: 5px;
        /*background-image:linear-gradient(to right,rgb(255, 255, 255),rgb(176, 220, 232));*/
        background-color:rgb(196, 229, 238);
    }

    .middleGrid{
        display: grid;
        grid-template-rows: 280px 400px;
        grid-row-gap: 20px;
        width: 100%;
        margin-top: 5px;
    }

    .currentAvatarGrid{
        display:grid;
        width: 100%;
        text-align:center;
    }

    .availableAvatarGrid{
        display: grid;
        margin-left: 15px;
        grid-template-columns: 18% 18% 18% 18% 18%;
        grid-row-gap: 5px;
        grid-column-gap: 2%;
        overflow:scroll;

    }

    .availableAvatar{
        border: solid rgb(130, 162, 173);
        border-width: 3px;
        border-radius: 3px;
        transition: all 0.5s;
        margin-top:10px;
        margin-left:10px;
    
        
    }

    .availableAvatar:hover{
        cursor: pointer;
        transform:scale(1.1);
        border: solid rgb(105, 131, 138);
    }

    .profileAvatar{
        width: 172px;
        height: 190px;
        border-radius: 50%;
        border-width: 5px;
    }

    .backArrow{
        width: 50px;
        height: 50px;
        position:relative;
        left:5px;
        top:5px;
    }

    .available_avatar{
        width: 150px;
        height: 165px;
    }

    .unavailable_avatar{
        width: 150px;
        height: 165px;
        filter:grayscale(100%);
    }

    .buttonStyle{
        width: 110px;
        height: 40px;
        border: solid rgb(105, 131, 138);
        border-width: 2px;
        border-radius: 5px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        font-size: large;
        color: rgb(105, 131, 138);
     }

    </style>

    <body onLoad="init()">
            <div class="grid">
                <div class="leftSideGrid">
                    <a href="javascript:history.go(-1)"><img src="icons/Back_Arrow_white.png" class="backArrow"></a>       
                </div>
                <div class="middleGrid">
                    <div class="currentAvatarGrid">
                        
                        <center><img src=<?php echo "avatars/",$row1['avatar'],".png"?> id="current_avatar" class="profileAvatar" style="margin-top: 25px;"></center>
                        <center><a href="" id="link"><button type="submit" class="buttonStyle" onClick="change_avatar()">Submit</button></a><center>
                        
                    </div>

                    <div class="availableAvatarGrid">
                        <div class="availableAvatar">
                            <center><img src="avatars/1.png" id="avatar_1" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/2.png" id="avatar_2" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/3.png" id="avatar_3" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/4.png" id="avatar_4" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/5.png" id="avatar_5" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/6.png" id="avatar_6" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/7.png" id="avatar_7" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/8.png" id="avatar_8" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/9.png" id="avatar_9" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/10.png" id="avatar_10" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        
                        <div class="availableAvatar">
                            <center><img src="avatars/11.png" id="avatar_11" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/12.png" id="avatar_12" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/13.png" id="avatar_13" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/14.png" id="avatar_14" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/15.png" id="avatar_15" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/16.png" id="avatar_16" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/17.png" id="avatar_17" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/18.png" id="avatar_18" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/19.png" id="avatar_19" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>
                        <div class="availableAvatar">
                            <center><img src="avatars/20.png" id="avatar_20" class="available_avatar" onClick="choose_avatar(this.id)"></center>
                        </div>

                    </div>
                </div>
                <div class="rightSideGrid"></div>
            </div>

    </body>
</head>
</html>