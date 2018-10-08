<?php
	session_start();
	include "connect.php";
	if(isset($_POST["btnIn"]) && !empty($_POST["txtEmail"]) && !empty($_POST["txtPassword"]) )
	{
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		$sql = mysqli_query($link,"SELECT * FROM tbluser WHERE nama = '$email' AND password = '$password' ");
		if($row = mysqli_num_rows($sql))
		{
			$_SESSION["emailUser"]=$email;
			header('location: dashboard.php');
		}
		else
		{
			$message = "Invalid email or password\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	if(!empty($_GET["logout"]))
    {
        if($_GET["logout"] == "q")
        {
            session_destroy();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>
			Dishub Project
		</title>
		
		<script src = "js/jquery-3.1.1.js"></script>
		<script src = "js/jquery-ui.js"></script>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/justified-nav.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="js/ie-emulation-modes-warning.js"></script>
		<style>
			body { 
			  background: url(http://uppkb.tricipta.com/public/images/uppkb2.png) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			}

			.panel-default {
			opacity: 0.9;
			margin-top:30px;
			}
			.form-group.last { margin-bottom:0px; }
		</style>
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-lock"></span> Login</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method = "POST">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">
									Email</label>
								<div class="col-sm-9">
									<input name="txtEmail" type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-3 control-label">
									Password</label>
								<div class="col-sm-9">
									<input name="txtPassword" type="password" class="form-control" id="inputPassword3" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label>
											<input type="checkbox"/>
											Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group last">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-success btn-sm" name="btnIn">
										Sign in</button>
										 <button type="reset" class="btn btn-default btn-sm">
										Reset</button>
								</div>
							</div>
							</form>
						</div>
						<div class="panel-footer">
							Not Registred? <a href="http://www.jquery2dotnet.com">Register here</a></div>
					</div>
				</div>
			</div>
		</div>



		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>