<!DOCTYPE html>
<!-- this page is designed to display diaryies for selected month -->
<html>
        <?php
            $lifetime=600;
            $username=$_POST['username'];
            $month=$_POST['month'];
            $year=$_POST['year'];
            $month_n=0;
            session_start();
            if(($_SESSION['user']==$username)&&(time()-$_SESSION['created'])<$lifetime)
            {
                if($year=='currentYear')
                {
                    $year=date("Y");
                }
                else if($year=='lastYear')
                {
                    $year=date("Y")-1;
                }
                else{
                    $year=date("Y")-2;
                }

                switch ($month) {
                    case "January":
                      $month_n=1;
                      break;
                    case "February":
                      $month_n=2;
                      break;
                    case "March":
                      $month_n=3;
                      break;
                    case "April":
                      $month_n=4;
                      break;
                    case "May":
                      $month_n=5;
                      break;
                    case "June":
                      $month_n=6;
                      break;  
                    case "July":
                      $month_n=7;
                      break;
                    case "August":
                      $month_n=8;
                      break;
                    case "September":
                      $month_n=9;
                      break;
                    case "October":
                      $month_n=10;
                      break;
                    case "November":
                      $month_n=11;
                      break;
                    case "December":
                      $month_n=12;
                      break;             
                 }

                include_once('dbConn.php');
                $sql1="SELECT content,writeDate from diary where username='$username' and year(writeDate)='$year' and month(writeDate)='$month_n' order by day(writeDate)";
                $result1 = mysqli_query($conn, $sql1);
            

                $writeDates=array();
                $contents=array();
                $length=$result1->num_rows;

                if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                       $writeDates[]=$row1['writeDate'];
                       $contents[]=$row1['content'];
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
                var month=<?php echo $month_n?>;
                var year=<?php echo $year?>;
                var writeDates=<?php echo json_encode($writeDates)?>;
                var contents=<?php echo json_encode($contents)?>;
                
                if(length>0)
                {
                    
                    for(var i=0;i<length;i++)
                    {
                        var div = document.getElementById("textGrid");
                        var outerGrid=document.createElement("div");
                        var dateGrid=document.createElement("div");
                        var contentGrid=document.createElement("div");
                        outerGrid.setAttribute('class','outerGrid');
                        dateGrid.setAttribute('class','dateGrid');
                        contentGrid.setAttribute('class','contentGrid');
                        var date=document.createElement("label");
                        var content=document.createElement("label");
                        date.setAttribute('class','dateText');
                        content.setAttribute('class','contentText');
                        date.innerText=writeDates[i];
                        content.innerText=contents[i];
                        dateGrid.appendChild(date);
                        contentGrid.appendChild(content);
                        outerGrid.appendChild(dateGrid);
                        outerGrid.appendChild(contentGrid);
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
                font-size: 23px;
                font-family:Trebuchet MS,sans-serif;
                font-weight:bold;
                line-height:205px;
                color: black;
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

            .TableGrid{
                display:grid;
                width:100%;
                grid-template-columns: 23% 73%;
                grid-column-gap:1%;
                margin-top:10px;
            }

            .dateGrid{
                width:100%;
                height:100%;
                background-color:rgb(202, 224, 232);
                text-align:center;
            }

            .contentGrid{
                width:100%;
                height:100%;
                text-align:justify;
                overflow:scroll;
                overflow-x:hidden;
            }
            

            .outerGrid{
                display:grid;
                width:800px;
                height:205px;
                grid-template-columns: 20% 80%;
                background-color:rgb(213, 239, 246);
                margin-left:65px;
                margin-top:15px;
                
            }
        </style>

    <header>
		<title>Diary</title>
	</header>

	<body onLoad='init()'>
        <?php
                $event='none';
                if(isset($_GET['event']))
                {
                    $event=$_GET['event'];
                }

                if($event=='empty')
                {
                    echo "<script>alert('Title and content cannot be empty')</script>";
                }
        ?>

        

            <div class="grid">

                <div class="leftGrid" >
                        <a href="diary_choose.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><img src="icons/read_diary.png" class="chooseIcon">
                        <a class="header">Life in <i><?php echo $month," ",$year?></i></a></center>
                
                    <div class="textGrid" id="textGrid">
                        <br>
                        <center><a class="hidden_note" id="note">No diary in this month</a></center>
                        
                    </div>
            
                </div>
            
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
        
	</body>
</html>