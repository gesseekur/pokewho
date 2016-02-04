<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  	  <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
       $('.parallax').parallax();
     });
  </script>

  <style type="text/css">
	.font{
		font-family:'Indie Flower', Arial;
	}
	
	.brand-logo {
		font-family:Montserrat, Arial;
	}
	.parallax-container {
      height: "your height here";
    }
      
    body {
    	background-image:url("assets/img/europe.jpg");
    }

	fieldset {
		border: 1px solid black;
	}

	.row {
		margin-top:5%;
	}
	/*.login {*/
/*		display: inline-block;
		height:200px;
		width:250px;
		padding:10px;
		margin-left: 300px;
		position: fixed;
	}
	p {
		color:red;	.brand-logo {
		font-family:Montserrat, Arial;
	}
		font-size: 14px;
	}
	*/
	.msg {
		margin-left: 600px;
		font-size:14px;
		color:green;
	}

	.invalid {
		margin-left: 600px;
		font-size:14px;
		color:red;
	}

	</style>
 
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

	<nav>
		<div class="nav-wrapper  cyan darken-4">
			<a href="#" class="brand-logo center">PokeWho?</a>
		</div>
	</nav>

<!-- 	<div class="parallax-container">
      <img src="assets/img/europe.jpg"></div>
    </div> -->
<div class="row container">

		<fieldset class="col s6 m4 l4">
		<legend><h3 class="font">Login</h3></legend>
		<br>
		<form method="post" action="/sessions/login">
			Email: <input type="text" name="email"><br><br>
			Password: <input type="password" name="password"><br><br>
			<input class="waves-effect waves-light teal lighten-4 grey-text text-darken-4 btn" type="submit" value="Login">
		</form>
		<br>
		</fieldset>

		<fieldset class="register col s6 m6 l6" >
		<legend><h3 class="font">Register</h3></legend>
		<br>
		<form class="col s6 m6 l6" method="post" action="/sessions/register">
			Name: <input type="text" name="name"><br><br>
			Alias: <input type="text" name="alias"><br><br>
			Email: <input type="text" name="email"><br><br>
			Password: <input type="password" name="password">
			<p>*Password should be at least 8 characters</p>
			Confirm PW: <input type="password" name="conpw"><br><br>
			Birthday: <input type="date" name="birthday"><br><br>
			<input class="waves-effect waves-light teal lighten-4 grey-text text-darken-4 btn" type="submit" value="Register">
		</form>
		<br>
		</fieldset>

</div>
<div class="msg">
<?=  $this->session->flashdata('msg');?>
</div>

<div class="invalid">
<?=  $this->session->flashdata('invalid');?>
</div>

	
</body>
</html>