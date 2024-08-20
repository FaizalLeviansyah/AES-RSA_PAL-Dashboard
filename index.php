<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/bg.svg">
		</div>
		<div class="login-content">
            <form class="login-form" action="auth.php" method="post">
				<img src="assets/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Username</h5> -->
           		   		<input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<!-- <h5>Password</h5> -->
           		    	<input class="form-control" type="password" name="password" placeholder="Password" required>
            	   </div>
            	</div>
				<button class="btn btn-primary btn-block" name="login">Login <i class="fa fa-sign-in fa-lg"></i></button><br>
            	<!-- <input type="submit" class="btn" value="Login"> -->
		<p>User: admin Pass: 1</p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main1.js"></script>
</body>
</html>
