<!DOCTYPE html>
<!-- this page is designed for user to choose the month they want to read -->
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

        ?>

        <script>
            //initialize this page. Set proper values of available year
            //diary within three years are available
            function init()
            {
                var date = new Date();
                var year = date.getFullYear();
                var currentYear=document.getElementById("year");
                var lastYear=document.getElementById("lastYear");
                var yearBeforeLast=document.getElementById("yearBeforeLast");
                currentYear.innerText=year;
                lastYear.innerText=year-1;
                yearBeforeLast.innerText=year-2;
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

            .chooseIcon{
                width:70px;
                height:70px;
                margin-right:40px;
                margin-top:5px;
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

            
           
        </style>

    <header>
		<title>Diary</title>
	</header>

	<body onLoad="init()">
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

        <!-- this form transfer selected year and month the page called diary_read.php -->
        <form action="diary_read.php" method="post" name="read_diary">
            <div class="grid">

                <div class="leftGrid" >
                        <a href="diary_choose.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><img src="icons/read_diary.png" class="chooseIcon">
                        <a class="header">Read your life</a></center>
                        <p class="tipText">Please select the date you would like to read</p>

                
                    <div class="textGrid">
                        <div>
                            <center><a class="text">  Year</a>
                            <select name="year" style="margin-left:33px">
                            <option value="currentYear" id="year"></option>
                            <option value="lastYear" id="lastYear"></option>
                            <option value="yearBeforeLast" id="yearBeforeLast"></option>
                            </select></center>
                        </div>

                        <div>
                            <center><a class="text">Month</a>
                            <select name="month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                            </select></center>
                        </div>

                    </div>
                    <input type="hidden" name="username" value=<?php echo $username?>>
                    <input type="submit" value="Submit" id="submit" class="buttonStyle">
                </div>
                
                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
            </form>
        
	</body>
</html>