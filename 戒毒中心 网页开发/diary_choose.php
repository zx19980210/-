<!DOCTYPE html>
<!-- this page is designed for users to choose whether to read or write  -->
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


            .rightGrid{
                width:100%;
            }
            
            .background{
                width:560px;
                height:700px;
                margin-right:0px;
                
            }

            .header{
                font-size: 50px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                margin-top:20px;
                color: rgb(99, 165, 182);
            }

            .chooseGrid{
                text-align: center;
                display:grid;
                grid-template-columns: 50% 50%;
            }

            .chooseIcon{
                width:200px;
                height:200px;
                margin-top:160px;
            }

            .text{
                font-size: 40px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                margin-top:5px;
                color: black;
            }

            .backArrow{
                width: 50px;
                height: 50px;
                position:relative;
                left:10px;
                top:10px;
            }
           
        </style>

    <header>
		<title>Diary</title>
	</header>

	<body>
        <div class="grid">

            <div class="leftGrid" >
                <a href="patient_profile.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                <center><a class="header">Record your life</a></center>

                <div class="chooseGrid">
                    <div>
                        
                        <a href="diary_write.php?username=<?php echo $username?>"><img src="icons/write_diary.png" class="chooseIcon"></a>
                        <p class="text">WRITE</p>
                    </div>

                    <div>
                        <a href="diary_read_choose.php?username=<?php echo $username?>"><img src="icons/read_diary.png" class="chooseIcon"></a>
                        <p class="text">READ</p>
                    </div>
                </div>
            </div>

            <div class="rightGrid">
            <img src="icons/background.jpg" class="background">
            </div>
        </div>
        
	</body>
</html>