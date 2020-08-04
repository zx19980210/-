<!DOCTYPE html>
<!-- this page is designed to view current appointments-->
<html>
        <?php
            $lifetime=600;
            $username=$_GET['username'];
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {

                include_once('dbConn.php');
                $sql1="SELECT s.firstname,s.lastname,a.appointmentDate,a.confirm,a.reject FROM staff_profile s left join appointment a on s.username=a.doctor inner join r_profile r on r.username=a.patient 
                where a.patient='$username' and a.appointmentDate>=CURRENT_DATE order by confirm desc,reject ASC, appointmentDate asc";
                $result1 = mysqli_query($conn, $sql1);
            

                $firstname=array();
                $lastname=array();
                $appointmentDate=array();
                $confirm=array();
                $reject=array();
                $length=$result1->num_rows;

                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $firstname[]=$row1['firstname'];
                       $lastname[]=$row1['lastname'];
                       $appointmentDate[]=$row1['appointmentDate'];
                       $confirm[]=$row1['confirm'];
                       $reject[]=$row1['reject'];
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
                var length=<?php echo $length?>;
                var firstname=<?php echo json_encode($firstname)?>;
                var lastname=<?php echo json_encode($lastname)?>;
                var appointmentDate=<?php echo json_encode($appointmentDate)?>;
                var confirm=<?php echo json_encode($confirm)?>;
                var reject=<?php echo json_encode($reject)?>;
                
               if(length>0)
                {
                    //add elements into html based on the amount of current appointments.
                    for(var i=0;i<length;i++)
                    {
                        var div = document.getElementById("textGrid");
                        var nameGrid=document.createElement("div");
                        var dateGrid=document.createElement("div");
                        var statusGrid=document.createElement("div");
                        var tableGrid=document.createElement("div");

                        tableGrid.setAttribute('class','tableGrid');
                        nameGrid.setAttribute('class','nameGrid');
                        dateGrid.setAttribute('class','dateGrid');
                        statusGrid.setAttribute('class','statusGrid');

                        var date=document.createElement("label");
                        var name=document.createElement("label");
                        var status=document.createElement("label");

                        date.setAttribute('class','dateText');
                        name.setAttribute('class','dateText');
                        status.setAttribute('class','dateText');

                        date.innerText=appointmentDate[i];
                        name.innerText=firstname[i]+" "+lastname[i];

                        //check the value of reject and confirm, and then determine the status
                        if(reject[i]==1)
                        {
                            status.innerText='Rejected';
                            date.setAttribute('class','greyDateText');
                            name.setAttribute('class','greyDateText');
                            status.setAttribute('class','greyDateText');
                        }
                        else if(confirm[i]==1)
                        {
                            status.innerText='Confirmed';
                            date.setAttribute('class','confirmDateText');
                            name.setAttribute('class','confirmDateText');
                            status.setAttribute('class','confirmDateText');
                        }
                        else{
                            status.innerText='In process';
                        }
                        dateGrid.appendChild(date);
                        nameGrid.appendChild(name);
                        statusGrid.appendChild(status);

                        tableGrid.appendChild(dateGrid);
                        tableGrid.appendChild(nameGrid);
                        tableGrid.appendChild(statusGrid);
                        div.appendChild(tableGrid);
                    }
                }
                else{
                    var note= document.getElementById("note");
                    var sadEmote=document.getElementById("sadEmote");
                    note.setAttribute('class','note');
                    sadEmote.setAttribute('class','sadEmote');
                }
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
            .headerGrid{
                width:100%;
            }
            .textGrid{
                
                width:100%;
                height:550px;
                overflow:scroll;
                overflow-x:hidden;
            }

            .rightGrid{
                width:100%;
            }
            
            .background{
                width:560px;
                height:700px;
                margin-right:0px;
            }

            .chooseIcon{
                width:70px;
                height:70px;
                margin-right:40px;
                margin-top:5px;
            }

            .dateText{
                font-size: 24px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: black;
                line-height:60px;
            }

            .greyDateText{
                font-size: 24px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: grey;
                line-height:60px;
            }

            .confirmDateText{
                font-size: 24px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: rgb(73, 139, 157);
                line-height:60px;
            }

            .contentText{
                font-size: 20px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                font-size: large;
                color: rgb(105, 131, 138);
                margin-top:50px;
                background-color:white;
                outline:none;
                margin-left:407px;
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


            .note{
                font-size: 50px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                color: black;
                position:relative;
                top:200px;
            }

            .hidden_note{
                font-size: 30px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                color: black;
                visibility:hidden;
            }

            .tableGrid{
                display:grid;
                width:800px;
                height:60px;
                grid-template-columns: 33.3% 33.3% 33.3%;
                margin-top:10px;
                margin-left:60px;
            }

            .dateGrid{
                width:100%;
                height:100%;
                text-align:center;
                background-color:rgb(202, 224, 232);
            }

            .nameGrid{
                width:100%;
                height:100%;
                background-color:rgb(213, 239, 246);
                text-align:center;
            }

            .statusGrid{
                width:100%;
                height:100%;
                background-color:rgb(234, 247, 250);
                text-align:center;
            }

        </style>

    <header>
		<title>My appointment</title>
	</header>

	<body onLoad="init()">

            <div class="grid">

                <div class="leftGrid" >
                        <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><a class="header">Current appointments</a></center>

                    <div class="textGrid" id="textGrid">
                        <br>
                        <center><a class="hidden_note" id="note">No appointment</a></center>
                        
                    </div>
                </div>
            
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
        
	</body>
</html>