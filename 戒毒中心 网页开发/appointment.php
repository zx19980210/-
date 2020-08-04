<!DOCTYPE html>
<!-- this page provide two choices. One is making a new appointment after selecting date and doctor -->
<html>

        <?php
            $lifetime=600;
            $username=$_GET['username'];
            session_start();
            if(($_SESSION['user']!=$username)||(time()-$_SESSION['created'])>$lifetime)
            {
                session_unset();
                session_destroy();
                header("Location:login.php?event=invalid");
            }
            else{
                include_once('dbConn.php');
                //get information of all doctors
                $sql1="SELECT username,firstname,lastname from staff_profile where position='doctor'";
                $result1 = mysqli_query($conn, $sql1);
            
                $staff_username=array();
                $firstname=array();
                $lastname=array();
                $length=$result1->num_rows;

                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $staff_username[]=$row1['username'];
                       $firstname[]=$row1['firstname'];
                       $lastname[]=$row1['lastname'];
                    }
                } 
            }

        ?>

        <script>
            function init()
            {
                var length=<?php echo $length?>;
                var firstname=<?php echo json_encode($firstname)?>;
                var lastname=<?php echo json_encode($lastname)?>;
                
                //get the date of tomorrow
                var date = new Date();
                var nowMonth = date.getMonth() + 1;
                var strDate = date.getDate()+1;
                var seperator = "-";
                if (nowMonth >= 1 && nowMonth <= 9) {
                nowMonth = "0" + nowMonth;
                }

                if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
                }

                //set date of tomorrow as default date
                var tomorrow = date.getFullYear() + seperator + nowMonth + seperator + strDate;
                var init_date= document.getElementById("date");
                init_date.setAttribute('value',tomorrow);
                if(length>0)
                {
                    var select= document.getElementById("doctor");
                    for(var i=0;i<length;i++)
                    {
                        var new_option=document.createElement("option");
                        var full_name=firstname[i]+" "+lastname[i];
                        new_option.setAttribute('value',full_name);
                        new_option.innerText=full_name;
                        select.appendChild(new_option);
                    }
                }
            }

            function before_submit()
            {
                var select= document.getElementById("doctor");
                var selected=select.selectedIndex;
                var staff_username=<?php echo json_encode($staff_username)?>;
                var selected_username=staff_username[selected];
                var input_username=document.getElementById("doctor_username");
                input_username.setAttribute('value',selected_username);
            }

        </script>

		<style>  
			* {
			box-sizing: border-box;
			}
            
            .grid{
                display: grid;
                width: 1500px;
                height: 700px;
                grid-template-columns: 62.7% 37.3%;
                margin-left: auto;
                margin-right: auto;
            }

            .leftGrid{
                width: 100%;
            }

            .textGrid{
                width:100%;
                text-align:center;
            }


            .rightGrid{
                width:100%;
            }
            
            .background{
                width:560px;
                height:700px;
                margin-right:0px;
            }


            .text{
                font-size: 40px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                font-weight:bold;
                margin-top:30px;
                color: rgb(99, 165, 182);
            }

            .tipText{
                font-size: 25px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                font-weight:bold;
                margin-top:50px;
                color: black;
            }

            .buttonStyle{
                width: 250px;
                height: 40px;
                border: solid rgb(99, 165, 182);
                border-width: 2px;
                border-radius: 5px;
                font-family:Trebuchet MS,sans-serif;
                font-weight: bold;
                font-size: 20px;
                color: rgb(105, 131, 138);
                margin-top:50px;
                background-color:white;
                outline:none;
                margin-left:420px;
            }

            .backArrow{
                width: 50px;
                height: 50px;
                position:relative;
                left:10px;
                top:10px;
            }

            .header{
                font-size: 50px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                color: rgb(99, 165, 182);
            }

            select{
                outline: none;
                width: 250px;
                height: 40px;
                line-height: 250px;
                appearance: none;
                font-size:20px;
                color: black;
                border-width: 2px;
                border-radius: 5px;
                font-family:Trebuchet MS,sans-serif;
                border: solid rgb(99, 165, 182);
                margin-top:50px;
            }

            .date{
                outline: none;
                width: 250px;
                height: 40px;
                line-height: 250px;
                appearance: none;
                font-size:20px;
                color: black;
                border-width: 2px;
                border-radius: 5px;
                font-family:Trebuchet MS,sans-serif;
                border: solid rgb(99, 165, 182);
                margin-top:50px;
            }
            
           
        </style>

    <header>
		<title>Appointment</title>
	</header>

	<body onLoad="init()">
        <?php
                $event='none';
                if(isset($_GET['event']))
                {
                    $event=$_GET['event'];
                }

                if($event=='wrong')
                {
                    echo "<script>alert('Selected date is unavailable, please choose a day after today')</script>";
                }
        ?>

        
            <div class="grid">

                <div class="leftGrid" >
                        <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><a class="header">Schedule an appointment</a></center>
                        <p class="tipText">Please select the date and doctor</p>

                    <form action="upload_appointment.php" method="post" name="upload_appointment">
                        <div class="textGrid">
                            <div>
                                <center><a class="text">Doctor</a>
                                <select name="year" style="margin-left:20px" id="doctor">
                                
                                </select></center>
                            </div>      

                            <div>
                                <center><a class="text" style="margin-right:60px">Date</a>
                                <input type="date" id="date" class="date" name="date" value=""></center>
                            </div>

                        </div>
                        <input type="hidden" name="patient_username" value=<?php echo $username?>>
                        <input type="hidden" name="doctor_username" value="" id="doctor_username">
                        <input type="submit" value="Submit" id="submit" class="buttonStyle" onClick="before_submit()">
                    </form>
                        <a href="view_appointment.php?username=<?php echo $username?>"><button class="buttonStyle">View appointment</button></a>
                        </div>
                
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
            
        
	</body>
</html>