<!DOCTYPE html>
<!-- this page is designed for user to write diary for today -->
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

            .headerGrid{
                width:100%;
            }

            .textGrid{
                width:100%;
                text-align:center;
                overflow: scroll;
                overflow-x:hidden;
                overflow-y:hidden;
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
                width:60px;
                height:60px;
                margin-right:30px;
                margin-top:5px;
            }

            .text{
                font-size: 40px;
                font-family:Trebuchet MS,sans-serif;
                text-align:center;
                margin-top:5px;
                color: black;
            }

            .buttonStyle{
                width: 100px;
                height: 40px;
                border: solid rgb(105, 131, 138);
                border-width: 2px;
                border-radius: 5px;
                font-family:Trebuchet MS,sans-serif;
                font-weight: bold;
                font-size: large;
                color: rgb(105, 131, 138);
                margin-top:20px;
            }

            .titleText{
                width: 700px;
                height: 30px;
                border: solid rgb(105, 131, 138);
                border-width: 2px;
                border-radius: 5px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: large;
                font-weight: bold;
                outline:none;
                margin-top:50px
            }

            .contentText{
                width: 700px;
                height: 400px;
                border: solid rgb(105, 131, 138);
                border-width: 2px;
                border-radius: 5px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: large;
                outline:none;
                margin-top:50px
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
           
        </style>

    <header>
		<title>Diary</title>
	</header>

	<body>
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

        <form action="upload_diary.php" method="post" name="write_diary">
            <div class="grid">
                <div class="leftGrid" >
                        <a href="diary_choose.php?username=<?php echo $username?>"><img src="icons/Back_Arrow.png" class="backArrow" ></a>
                        <center><img src="icons/write_diary.png" class="chooseIcon">
                        <a class="header">Write down your life</a></center>

                    <div class="textGrid">
                        <textarea type ="text" placeholder="Content" name="content" id = "content" value = "" class="contentText"></textarea><br>
                        <input type="hidden" name="username" value=<?php echo $username?>>
                        <input type="submit" value="Submit" id="submit" class="buttonStyle">
                    </div>
                </div>

                <div class="rightGrid">
                <img src="icons/background.jpg" class="background">
                </div>
            </div>
        </form>
        
	</body>
</html>