<!DOCTYPE html>
<!-- change_password.php designs the UI of the page used for changing password-->
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
                margin-top: 80px;
                margin-left: -40px;
				}

            
            .backArrow{
                width: 50px;
                height: 50px;
                position:relative;
                left:10px;
                top:10px;
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
                
            }
    
        </style>
    <header>
		<title>Change password</title>
	</header>
	<body>

        <?php
            $event='none';
            if(isset($_GET['event']))
            {
                $event=$_GET['event'];
            }

            if($event=='origin_error')
            {
                echo "<script>alert('Original username or password is wrong, please enter again')</script>";
            }

            if($event=='empty')
            {
                echo "<script>alert('Please enter complete information')</script>";
            }

            if($event=='match_error')
            {
                echo "<script>alert('Passwords entered twice are inconsistent')</script>";
            }

            if($event=='length_error')
            {
                echo "<script>alert('Limitation of password length is 15 characters, please enter again')</script>";
            }

        
        ?>

        <!-- username, oldpassword, new password, confirmed password are passed to change_password_check.php --> 
        <form action="change_password_check.php" method="post" name="change_password">
            <div class="grid">
                
                <div class="childGrid" >
                    
                    <img src="despiegel.jpg" class="logo">
                </div>

                <div class="childGrid" style="background-color: rgb(184, 214, 222)">
                    <article>
                        <p style="margin-left: 200px;">
                            <label>Gebruikersnaam</label>
                        <br>
                            <input type = "text" name="username" id = "username" value = "" class="inputStyle"/>
                        </p >
                        <p style="margin-left: 200px;">
                            <label>Huidig_Wachtwoord</label>
                        
                            <input type = "password" name="old_password" id = "old_password" value = "" class="inputStyle"/>
                            </p>
                        <p style="margin-left: 200px;">
                            <label>Nieuw_Wachtwoord</label>
                        <br>
                            <input type = "password" name="new_password" id = "new_password" value = "" class="inputStyle"/>
                            </p>
                        <p style="margin-left: 200px;">
                            <label>Herhaling</label>
                        <br>
                            <input type = "password" name="confirm_password" id = "confirm_password" value = "" class="inputStyle"/>
                            </p>
                        <input type="submit" value="Bevestig" class="buttonStyle">
                    </article>
            </div>
        </div>
        </form>
	</body>
</html>