<?php 
	session_start();
	require("config.php");
	
	if(!isset($_SESSION["login_info"])){
		header("location:index.php");
	}
	
	// $users=[];
	// $current_month_day=date("m-d");
	// $current_year=date("Y");
	// #Select today birthday users
	// $sql="select * from users where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}' and WISH_YEAR<>'{$current_year}'";
	// $res=$con->query($sql);
	// if($res->num_rows>0){
	// 	while($row=$res->fetch_assoc()){
	// 		$users[]=$row;
	// 	}
	// }
	
	#Send birthday wishes to Mail
	// foreach($users as $user){
		
		/*$to = $user["EMAIL"];

		$subject = "Birthday Greetings";

		$message = "<h3>Wish you Happy Birthday {$user["NAME"]}</h3>";

		$header="From:user@domain.in"."\r\n";
		$header.="X-Mailer:PHP/".phpversion()."\r\n";
		$header.="Content-type:text/html; charset=iso-8859-1";  

		$response=mail($to,$subject,$message,$header);
		
		if($response==true){
			$sql="update users set WISH_YEAR='{$current_year}'  where ID='{$user["ID"]}'";
			$con->query($sql);
		}else{
			echo "Mail send Failed!!!";
		}*/
	// }
	
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";?>
	<!-- <style>
		*,
*::before,
*::after {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  line-height: 1;
}

html,
body {
  
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  height: 100%;
  width: 100%;
  /* font-size: 10vmin; */
  font-family: "Montserrat", sans-serif;
  /* background: repeating-linear-gradient(45deg, #2b2b2b 0% 10%, #222 0% 50%); */
  /* background-position-x: 0; */
  /* background-position-y: center; */
  /* background-size: 15px 15px; */
}

welcome-card {
  position: relative;
  overflow: hidden;
  display: flex;
  height: calc(100% - 20vh);
  width: calc(100% - 20vw);
  margin: 10vh 10vw;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
  background-image: url("https://media4.giphy.com/media/fYzRXhXrUVGqEpDhrd/giphy.gif?cid=ecf05e475ntgw6384wzf8ltqyuj1grd6w1j9qudeza46s5ds&rid=giphy.gif&ct=s");
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-position: right top;
  box-shadow: #000 0px 0px 20px 3px;
  border-radius: 10px;
}

welcome-card:before {
  content: "";
  background-color: #123;
  position: absolute;
  top: 0;
  right: 0%;
  height: 100%;
  width: 100%;
  animation: background-left 2s forwards 1s, background-right 1s forwards 3s;
}

welcome-card:after {
  content: attr(data-title);
  word-spacing: -3vw;
  line-height: 100%;
  font-size: 10vw;
  font-weight: 400;
  position: absolute;
  top: 0;
  left: 0;
  background-image: url("https://media4.giphy.com/media/2tC0UEidDWnoeX5fh1/giphy.gif?cid=ecf05e475ntgw6384wzf8ltqyuj1grd6w1j9qudeza46s5ds&rid=giphy.gif&ct=s");
  background-size: 80vw 80vh;
  background-position: left top;
  background-clip: text;
  -webkit-background-clip: text;
  color: rgba(255, 255, 255, 1);
  padding-top: 80vh;
  padding-left: 1vw;
  animation: text-center 2s forwards 1s, text-right 2s forwards 3s;
}

@keyframes background-left {
  from {
    right: 0%;
    width: 100%;
  }
  to {
    right: 50%;
    width: 50%;
  }
}

@keyframes background-right {
  from {
    right: 50%;
  }
  to {
    right: 0%;
  }
}

@keyframes text-center {
  from {
    padding-top: 80vh;
  }
  to {
    padding-top: 35vh;
  }
}

@keyframes text-right {
  from {
    width: 100%;
    padding-top: 35vh;
    padding-left: 1vw;
    color: rgba(255, 255, 255, 1);
  }
  to {
    width: 50%;
    padding-top: 22.5vh;
    padding-left: 45vw;
    color: rgba(255, 255, 255, 0.25);
  }
}

	</style> -->
	<style>


body{
	background-color:#000000;
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
	
	<body>
		<?php include "navbar.php"; ?>
		<div class="main-header">
			<h1>
             REMINDER TRACKING TOOL
			</h1>
			<hr>
			<p>
				WELCOME TO REMINDER TRACKING TOOL
			</p>
		</div>
	

	</body>
</html>