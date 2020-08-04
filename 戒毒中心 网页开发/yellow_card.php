<!DOCTYPE html>
<!-- this page is used to show the date and reasons of current yellow cards -->
<html>
        <?php
            $lifetime=600;
            $username=$_GET['username'];
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {

                include_once('dbConn.php');
                //find date and description information about current yellow cards
                $sql1="SELECT time,description FROM yellow_card where username='$username' order by time desc";
                $result1 = mysqli_query($conn, $sql1);
            

                $time=array();
                $description=array();
                $length=$result1->num_rows;

                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $time[]=$row1['time'];
                       $description[]=$row1['description'];
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
                var time=<?php echo json_encode($time)?>;
                var description=<?php echo json_encode($description)?>;
                
                
               if(length>0)
                {
                    
                    for(var i=0;i<length;i++)
                    {
                        var div = document.getElementById("textGrid");
                        var reasonGrid=document.createElement("div");
                        var dateGrid=document.createElement("div"); 
                        var outerGrid=document.createElement("div"); 

                        dateGrid.setAttribute('class','dateGrid');
                        reasonGrid.setAttribute('class','reasonGrid');
                        outerGrid.setAttribute('class','outerGrid');

                        var date=document.createElement("label");
                        var reason=document.createElement("label");

                        date.setAttribute('class','dateText');
                        reason.setAttribute('class','reasonText');

                        date.innerText=time[i];
                        reason.innerText=description[i];

                        dateGrid.appendChild(date);
                        reasonGrid.appendChild(reason);

                        outerGrid.appendChild(dateGrid);
                        outerGrid.appendChild(reasonGrid);
                        div.appendChild(outerGrid);
                    }
                }
                else{
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
                height:500px;
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
                font-size: 28px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                color: black;
                line-height:140px;
            }

            .reasonText{
                font-size: 23px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: black;
                
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

        
            .outerGrid{
                display:grid;
                width:800px;
                height:140px;
                grid-template-columns: 30% 70%;
                background-color:rgb(213, 239, 246);
                margin-left:65px;
                margin-top:15px;
                
            }

            .dateGrid{
                width:100%;
                height:100%;
                background-color:rgb(202, 224, 232);
                text-align:center;
            }

            .reasonGrid{
                width:100%;
                height:100%;
                text-align:justify;
            }
        </style>

    <header>
		<title>My yellow card</title>
	</header>

	<body onLoad="init()">

            <div class="grid">

                <div class="leftGrid" >
                        <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><img src="icons/yellowCard.png" class="chooseIcon">
                        <a class="header">My yellow cards</a></center>
                        

                
                    <div class="textGrid" id="textGrid">
                        <center><a class="hidden_note" id="note">Good job ! No yellow cards</a></center>
                        
                    </div>
            
                </div>
            
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
        
	</body>
</html>