<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

//CHECK IF ENTERED USER INFORMATION EXISTS IN DATABASE 
$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>


<!DOCTYPE html>
    <html> 
        <head>
            <title>Cakes & Crafts by Nza & Lay</title>
            <link rel="stylesheet" href="style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
            
        </head>
    <body>
        <div class="content-login">

            <div class="right-half">
                <div class="logobox">
                    <img src="imgs/CakesCraftsLogo2.png" alt="Cakes&Crafts">
                </div>
            </div>

            <div class="log-in">


                <h2>Let's get started</h2>
                <form id="log-in-form"method="POST" action="" name="login">
                    <div class="form-txt-box">
                        <h2 class="form-h2">Please login to your account</h2>
                    </div>
	                <div class="box1">
		                <input type="email" class="input" required name="useremail" placeholder="example@mail.com"/>
	                </div>
	                <div class="box1">
		                <input type="password" class="input" required name="password" placeholder="password"/>
	                </div>
	                <div>
		                <input type="submit" class="button" name="submit" value="LOG-IN"/>
	                </div>
	            </form>
                
            </div>

        </div>
    </body>

    </html>