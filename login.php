<?php
session_start();
if(isset($_SESSION['login_id'])){
	$_SESSION = []; 
   }

require 'db_connection.php';
require 'google-api/vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('YOUR_SIGNIN_WITH_GOOGLE_CLIENT_ID');
// Enter your Client Secrect
$client->setClientSecret('YOUR_SIGNIN_WITH_GOOGLE_SECRET_KEY');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/tutors/Anyar/login.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){
            echo "user alerady exist";
            $_SESSION['login_id'] = $email; 
            header("Location: home.php");
            exit;

        }

        else{
                
			$value = "YOU HAVE NOT REGISTRED SIGN UP PLEASE";
			echo "<p style='color:red;text-align:center;font-weight:bold;font-size:20px;'>" . $value . "</p>";
                 

        }

    }
    else{
        header('Location: login.php');
        exit;
    }
    
  else: 
    // Google Login Url = $client->createAuthUrl(); 


?>
<?php endif; ?>



<?php
 require 'db_connection.php';
  $status=0;
  if(isset($_POST['login'])){
  	
	$secretkey = "YOUR_recaptcha_WITH_GOOGLE_secretkey";
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
		$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
		$response = json_decode($response);
		if($response ->success){
		  $status=1;

		  }
		}


	if($status==1){
  $username = mysqli_real_escape_string($db_connection, $_POST['username']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);
  $password = md5($password);
  $get_user = mysqli_query($db_connection, "SELECT * FROM normal WHERE username='$username' AND password='$password' LIMIT 1");
  $email = "";
  if(mysqli_num_rows($get_user) > 0){
	   
	while($rowData = mysqli_fetch_array($get_user)){
		$email=$rowData["email"];
        }

      $_SESSION['login_id'] = $email; 
	  header("Location: home.php");
	  exit;
  }

  else{
		  
	  $value = "YOU HAVE NOT REGISTRED SIGN UP PLEASE";
	  echo "<p style='color:red;text-align:center;font-weight:bold;font-size:20px;'>" . $value . "</p>";
  }

	}

	else{
		$value = "YOU HAVE TO VERIFY THAT YOU ARE NOT ROBOT";
	  echo "<p style='color:red;text-align:center;font-weight:bold;font-size:20px;'>" . $value . "</p>";

	}




 }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SMART IQ LOGIN</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
     
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 630px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 30px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

 #signup{
     padding-top:10px;
     padding-left:32px;
     font-size:15px;
     color:black;
     font-weight:bold;
 }

 .fa {
  padding: 20px;
  font-size: 22px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  
}
.fa1{
    color:red;
}
.space{
     display:flex;
     justify-content: space-around;
}
  
.shift{
	padding-left:100px;
}
 
 
 </style>

</head>
<body>
   
<div class="container">
	<div class="screen">
		<div class="screen__content">

			<form class="login" action="" method="post">
			<div class="login__field">
			  <a href="<?php echo $client->createAuthUrl(); ?>" class="google btn">
              <i class="fa fa-google fa-fw"></i> Login with Google
              </a>
			 </div>
                    <div class="shift">OR</div>
				<div class="login__field">
					<i class="fa fa-user"></i>
					<input type="text" class="login__input" placeholder="User name" name="username">
				</div>
				<div class="login__field">
					<i class=" fa fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password">
				</div>
				
           <div class="g-recaptcha" data-sitekey="6LdmUP4hAAAAAJAawCe1jqfjiTBGOXncLWeattHs"></div>
				
		  <button class="button login__submit" name="login">
					<span class="button__text">Log In Now</span>
					<i class=" "></i>
				</button>
                  </form>

                <p>
                 <a href="signup.php" id="signup">Don't Have an account?sign up</a>	
                 </p><br>
		</div>

		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>