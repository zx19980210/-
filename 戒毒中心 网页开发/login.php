<!DOCTYPE html>
<!--login.php designs the UI of this page-->
<html>

		<style>  
			* {
			box-sizing: border-box;
			}
			section {
				padding: 100px;
  				width: 300px;
				}

			article {
  				padding: 70px;
	  			width: 300px;
                font-size: x-large;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: bold;
                color:rgb(105, 131, 138);
                margin-top: 120px;
                margin-left: -40px;
				}
            
            .grid{
                display: grid;
                width: 1500px;
                height: 700px;
                grid-template-columns: 49% 49%;
                grid-column-gap:2%;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }

            .childGrid{
                width: 100%;
                
            }

            .right_childGrid{
                width:100%;
                display: grid;
                grid-template-rows: 65% 35%;
            }

            .logo{
                width:500px;
                height:350px;
                margin-top: 150px;
            }

            .inputStyle{
                width: 300px;
                height: 40px;
                border: solid rgb(130, 162, 173);
                border-width: 2px;
                border-radius: 5px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: large;
                font-weight: bold;
                outline:none;
            }

            .buttonStyle
            {
                width: 300px;
                height: 40px;
                border: solid rgb(105, 131, 138);
                border-width: 2px;
                border-radius: 5px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: bold;
                font-size: large;
                color: rgb(105, 131, 138);
                margin-left: 200px;
                margin-top:10px;
                
            }


    
        </style>
    <header>
		<title>DeSpiegel</title>
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
                echo "<script>alert('Please enter intact username and password')</script>";
            }

            if($event=='wrong')
            {
                echo "<script>alert('Username or password is wrong, please try again')</script>";
            }

            if($event=='invalid')
            {
                echo "<script>alert('Certificate is invalid, please login again')</script>";
            }

            if($event=='success')
            {
                echo "<script>alert('Password reset complete')</script>";
            }
        ?>

        
            <div class="grid">

                <div class="childGrid" >
                    <img src="despiegel.jpg" class="logo">
                </div>

                <div class="right_childGrid" style="background-color: rgb(184, 214, 222)">
                <!-- form is uploaded to another php file to check the correctness of login information-->
                    <form action="login_check.php" method="post" name="Login">
                        <div>
                            <article>
                                <p style="margin-left: 200px;">
                                    <label>Gebruikersnaam</label>
                                <br>
                                    <input type = "text" name="username" id = "username" value = "" class="inputStyle"/>
                                </p >
                                <p style="margin-left: 200px;">
                                    <label>Wachtwoord</label>
                                <br>
                                    <input type = "password" name="password" id = "password" value = "" class="inputStyle"/>
                                    </p>
                                <p>    
                                    <input type="submit" value="Inloggen" class="buttonStyle">
                                    </p >
                                
                            </article>
                        </div>
                    </form>

                    <div>
                        <a href="change_password.php"><button class="buttonStyle" style="margin-left:25px">Wachtwoord wijzigen</button></a>
                    </div>
            </div>
        </div>
        
	</body>
</html>