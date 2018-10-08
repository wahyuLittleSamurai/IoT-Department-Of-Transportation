<?php
	session_start();
	include "connect.php";
	date_default_timezone_set("Asia/Jakarta");
    $getDate = date("Y-m-d H:i:s");
	if(empty($_SESSION["emailUser"]) )
	{
		header("location: index.php");
	}
	else
	{
	    $kelas1;$kelas2;$kelas3;
	    $getDatabase = mysqli_query($link, "SELECT * FROM tblmst");
	    while($valKelas = mysqli_fetch_array($getDatabase))
	    {
	        $kelas1=$valKelas["kelas1"];
	        $kelas2=$valKelas["kelas2"];
	        $kelas3=$valKelas["kelas3"];
	    }
		if(isset($_POST["btnEdit"]) && !empty($_POST["txtMinKelas1"]) && !empty($_POST["txtMaxKelas2"]) && !empty($_POST["txtMaxKelas3"]) )
		{
			$grabKelas1 = $_POST["txtMinKelas1"];
			$grabKelas2 = $_POST["txtMaxKelas2"];
			$grabKelas3 = $_POST["txtMaxKelas3"];
			
			$sqlFile = "UPDATE tblmst SET kelas1='$grabKelas1',kelas2='$grabKelas2',kelas3='$grabKelas3'";
			
			$queryFile = mysqli_query($link, $sqlFile);
			header("location: dashboard.php");
			
		}
	
		
	}
?>
<html>
	<head>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		<script>
			$(function() {
				$('.required-icon').tooltip({
					placement: 'left',
					title: 'Required field'
					});
			});
		</script>
		<style>
			body{
				
			  background-color: #04265b;
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			}
			input, textarea, button { margin-top:10px }

			/* Required field START */

			.required-field-block {
				position: relative;   
			}

			.required-field-block .required-icon {
				display: inline-block;
				vertical-align: middle;
				margin: -0.25em 0.25em 0em;
				background-color: #E8E8E8;
				border-color: #E8E8E8;
				padding: 0.5em 0.8em;
				color: rgba(0, 0, 0, 0.65);
				text-transform: uppercase;
				font-weight: normal;
				border-radius: 0.325em;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				-ms-box-sizing: border-box;
				box-sizing: border-box;
				-webkit-transition: background 0.1s linear;
				-moz-transition: background 0.1s linear;
				transition: background 0.1s linear;
				font-size: 75%;
			}
				
			.required-field-block .required-icon {
				background-color: transparent;
				position: absolute;
				top: 0em;
				right: 0em;
				z-index: 10;
				margin: 0em;
				width: 30px;
				height: 30px;
				padding: 0em;
				text-align: center;
				-webkit-transition: color 0.2s ease;
				-moz-transition: color 0.2s ease;
				transition: color 0.2s ease;
			}

			.required-field-block .required-icon:after {
				position: absolute;
				content: "";
				right: 1px;
				top: 1px;
				z-index: -1;
				width: 0em;
				height: 0em;
				border-top: 0em solid transparent;
				border-right: 30px solid transparent;
				border-bottom: 30px solid transparent;
				border-left: 0em solid transparent;
				border-right-color: inherit;
				-webkit-transition: border-color 0.2s ease;
				-moz-transition: border-color 0.2s ease;
				transition: border-color 0.2s ease;
			}

			.required-field-block .required-icon .text {
				color: #B80000;
				font-size: 26px;
				margin: -3px 0 0 12px;
			}
			.button--tamaya {
				border: 2px solid #40a304 !important;
				border-radius: 5px;
				color: #7986cb;
				min-width: 400px;
				overflow: hidden;
				text-transform: uppercase;
				letter-spacing: 1px;
			}
			.button--border-thick {
				border: 3px solid;
			}
			.button {
				background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
				border: medium none;
				color: inherit;
				display: block;
				float: left;
				max-width: 400px;
				min-width: 199px;
				padding: 1em 7em;
				position: relative;
				vertical-align: middle;
				z-index: 1;
			}
			.button--tamaya::before {
				padding-top: 1em;
				top: 0;
			}
			.button--tamaya::before,
			.button--tamaya::after {
				background: #40a304;
				color: #fff;
				content: attr(data-text);
				height: 50%;
				left: 0;
				overflow: hidden;
				position: absolute;
				transition: transform 0.3s cubic-bezier(0.2, 1, 0.3, 1) 0s;
				width: 100%;
			}
			.button--tamaya::after {
				bottom: 0;
				line-height: 0;
			}
			.button--tamaya:hover::before {
				transform: translate3d(0px, -100%, 0px);
			}
			.button--tamaya:hover::after {
				transform: translate3d(0px, 100%, 0px);
				color: #40a304;
			}
			.button--tamaya:hover {
				color: #40a304;
				font-weight: 600;
			}
			h1 {
				padding-top: 150px;
				font-family: raavi;
				font-size: 30px;
				font-weight: 600;
				line-height: 18px;
				color: #fff;
			}
			/* Required field END */

		</style>
	</head>
	<body>
		<div class="container">

			<form method="POST" role="form" style="width:400px; margin: 0 auto;">
				<h1>Input Data MST</h1>
				
			    <div class="required-field-block">
					<input type="text" name="txtMinKelas1" placeholder="Min Kelas 1" class="form-control" value="<?php echo $kelas1; ?>">
					<div class="required-icon">
						<div class="text">*</div>
					</div>
				</div>
		 
				<div class="required-field-block">
					<input type="text" name="txtMaxKelas2" placeholder="Max Kelas 2" class="form-control" value="<?php echo $kelas2; ?>">
					<div class="required-icon">
						<div class="text">*</div>
					</div>
				</div>
				<div class="required-field-block">
					<input type="text" name="txtMaxKelas3" placeholder="Max Kelas 3" class="form-control" value="<?php echo $kelas3; ?>">
					<div class="required-icon">
						<div class="text">*</div>
					</div>
				</div>
    				
				<button name="btnEdit" style="width: 400px;" data-animation="animated bounceInUp" class="button button--tamaya button--border-thick" data-text="Edit"><span>Edit</span></button>
				
				<div style="text-align: center; color: #fff; padding-top: 25px;"><span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/dashboard.php">Home</a></span>
			    || <span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/formReport.php">Report</a></span> || <span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/formKendaraan.php">Kendaraan</a></span> || <span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/formInput.php">Input Kendaraan</a></span> ||
			    <?php

			        if(!empty($_SESSION["emailUser"]))

			        {
			            ?>
			            <span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/index.php?logout=q">Logout</a></span>

			            <?php
			        }

			        else

			        {
			            ?>
			            <span ><a style="color: #fff;" href="http://dishubproject.000webhostapp.com/index.php">Login</a></span>
			            <?php
			        }
			    ?>
			</div>
			</form>
			
		</div>
	</body>
</html>

