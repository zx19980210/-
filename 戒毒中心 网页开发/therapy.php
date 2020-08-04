<!DOCTYPE html>
<!-- this page shows current therapy of the logged residence-->
<html>
        <?php
            $lifetime=600;
            $username=$_GET['username'];
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {

                include_once('dbConn.php');
                $sql1="SELECT start,end,therapy FROM therapy where username='$username' order by end desc ";
                $result1 = mysqli_query($conn, $sql1);

                $start=array();
                $end=array();
                $therapy=array();
                $length=$result1->num_rows;

                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $start[]=$row1['start'];
                       $end[]=$row1['end'];
                       $therapy[]=$row1['therapy'];
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
                //receive data retrived from database
                var length=<?php echo $length?>;
                var startDate=<?php echo json_encode($start)?>;
                var endDate=<?php echo json_encode($end)?>;
                var therapyText=<?php echo json_encode($therapy)?>;
                
               if(length>0)
                {
                    //add elements into html based on the amount of therapies
                    for(var i=0;i<length;i++)
                    {
                        var div = document.getElementById("textGrid");
                        var startGrid=document.createElement("div");
                        var endGrid=document.createElement("div");
                        var therapyGrid=document.createElement("div");
                        var tableGrid=document.createElement("div");

                        tableGrid.setAttribute('class','tableGrid');
                        startGrid.setAttribute('class','startGrid');
                        endGrid.setAttribute('class','endGrid');
                        therapyGrid.setAttribute('class','therapyGrid');

                        var start=document.createElement("label");
                        var end=document.createElement("label");
                        var from=document.createElement("label");
                        var to=document.createElement("label");
                        var therapy=document.createElement("label");
                        var startbr=document.createElement("br");
                        var endbr=document.createElement("br");

                        start.setAttribute('class','dateText');
                        end.setAttribute('class','dateText');
                        from.setAttribute('class','dateText');
                        to.setAttribute('class','dateText');
                        therapy.setAttribute('class','therapyText');

                        start.innerText=startDate[i];
                        end.innerText=endDate[i];
                        from.innerText='From';
                        to.innerText='To';
                        therapy.innerText=therapyText[i];

                        startGrid.appendChild(from);
                        startGrid.appendChild(startbr);
                        startGrid.appendChild(start);
                        endGrid.appendChild(to);
                        endGrid.appendChild(endbr);
                        endGrid.appendChild(end);
                        therapyGrid.appendChild(therapy);

                        tableGrid.appendChild(startGrid);
                        tableGrid.appendChild(endGrid);
                        tableGrid.appendChild(therapyGrid);
                        div.appendChild(tableGrid);
                    }
                }
                else{
                    //if no therapies are scheduled, show a hint on screen
                    var note= document.getElementById("note");
                    note.setAttribute('class','note');
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
                font-size: 22px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: black;
                line-height:40px;
            }

            .therapyText{
                font-size: 22px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: black;
                line-height:80px;
            }

            .greyTherapyText{
                font-size: 24px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: grey;
                line-height:100px;
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
                font-size: 40px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                color: black;
                position:relative;
                top:200px;
            }

            .hidden_note{
                font-size: 40px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                color: black;
                visibility:hidden;
            }

            .tableGrid{
                display:grid;
                width:800px;
                height:80px;
                grid-template-columns: 25% 25% 50%;
                margin-top:10px;
                margin-left:60px;
            }

            .startGrid{
                width:100%;
                height:100%;
                text-align:center;
                background-color:rgb(202, 224, 232);
            }

            .endGrid{
                width:100%;
                height:100%;
                background-color:rgb(213, 239, 246);
                text-align:center;
            }

            .therapyGrid{
                width:100%;
                height:100%;
                background-color:rgb(234, 247, 250);
                text-align:center;
                overflow:hidden;
            }
        </style>

    <header>
		<title>My therapy</title>
	</header>

	<body onLoad="init()">

            <div class="grid">

                <div class="leftGrid" >
                        <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><a class="header">My therapy</a></center>

                    <div class="textGrid" id="textGrid">
                        <br>
                        <center><a class="hidden_note" id="note">No scheduled therapy, please contact your doctor</a></center>
                    </div>
                        
                </div>
            
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
        
	</body>
</html>