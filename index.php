<?php 
	session_start();
	require("config.php");

?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";?>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#720d1b;;">
		  <a class="navbar-brand" style="color:#ae943f;" href="index.php"> Reminder Tracking Tool
</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		</nav>
		<div class="main-header">
			<h1>
             REMINDER TRACKING TOOL
			</h1>
			<hr>
			<p>
			72 DRAGONS REMINDER TRACKER LOGIN
			</p>
		</div>
<style>
	body{
		background-color:#000000;
	}
	.btn-primary {
    color: #fff;
    background-color: #bd2130;
   
}

.submit{
    color: #ae943f;
    background-color:#000000;
    border: 2px solid #ae943f;;
	
}
label{
	color: #ae943f;
}



		.main-header{
			margin: auto;
			margin-top: 50px;
  width: 60%;
  border: 3px solid #720d1b;;
  padding: 10px;
			
			
		}
		hr{
			background-color: black;
			width: 60%;
		}

		h1 , p {
      color:#ae943f;
			font-weight: 900;
			text-align: center;
		}

    a:hover {
  font-size: 20px;
  color: #720d1b;
  cursor: pointer;
}
p:hover {
  font-size: 20px;
  color: #720d1b;
  cursor: pointer;
}
</style>
			<div class='row'>
				<div class='col-md-5 mx-auto'>
					<h3 class='text-center mt-5' style="color:#ae943f;">LOGIN HERE</h3>
					<?php 
						if(isset($_POST["login"])){
							$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
							$uname=mysqli_real_escape_string($con,$_POST["uname"]);
							$upass=mysqli_real_escape_string($con,$_POST["upass"]);
							
							$sql="select * from admin where ANAME='{$uname}' and APASS='{$upass}'";
							$res=$con->query($sql);
							if($res->num_rows>0){
								$row=$res->fetch_assoc();
								$_SESSION["login_info"]=$row;
								header('location:home.php');
							}else{
								echo"<div class='alert alert-danger'>Invalid Login Details.</div>";
							}
						}
					?>
					<form action='index.php' method='post'>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" class="form-control" name='uname'  placeholder="UserName" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name='upass' placeholder="Password" required>
						</div>
						<div class="form-group text-center">
							<input type='submit' name='login' value='Login' class='submit'>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</body>
</html>