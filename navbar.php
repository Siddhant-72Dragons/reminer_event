<?php 
	function number_suffix($number){
		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
		 if ((($number % 100) >= 11) && (($number%100) <= 13)){
			return $number. 'th';
		 }else{
			return $number.$ends[$number % 10];
		 }
	}
	
	$notifications=[];
	$current_month_day=date("m-d");
	$sql="select * from users where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$age=(date("Y")-date("Y",strtotime($row["DOB"])))+1;
			$notifications[]="<i class='fa fa-bell'></i> Wish <b>{$row["NAME"]}</b> a Happy Birthday!<br> This is <b>{$row["NAME"]}</b>'s ".number_suffix($age)." Birthday. date of birth is <b>".date("d-m-Y",strtotime($row["DOB"]))."</b>";
		}
	}
?>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color:#720d1b;;">
	<a class="navbar-brand" href="home.php">
		<img src="http://45.76.181.164:4003/images/72dragons-small.png" alt="" height="70px" width="70px" class="rotate">
	</a>
	<!-- <h2 style="color:#ae943f;">Reminder Tracking Tool
	<i class="fas fa-bell"></i>
</h2> -->

  <h1>REMINDER TRACKING TOOL </h1>
  
  <span  class="bell fa fa-bell"></span>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>




h1{
  font-family: tahoma;
  margin-right: 20px;
  margin-top: 30px;
  font-size: 50px;
  color:#ae943f;
  text-align: center;
  font-weight: 200;
}

.bell{
  display:block;
  width: 40px;
  height: 40px;
  font-size: 50px;
  margin:15px auto 0;
  color:#ae943f;
  -webkit-animation: ring 4s .7s ease-in-out infinite;
  -webkit-transform-origin: 50% 4px;
  -moz-animation: ring 4s .7s ease-in-out infinite;
  -moz-transform-origin: 50% 4px;
  animation: ring 4s .7s ease-in-out infinite;
  transform-origin: 50% 4px;
}

@media only screen and (max-width: 800px) {
 .bell{
  display:none;
 }
 h1{
  font-weight: 900;
  font-size: 13px;
 }
}

@-webkit-keyframes ring {
  0% { -webkit-transform: rotateZ(0); }
  1% { -webkit-transform: rotateZ(30deg); }
  3% { -webkit-transform: rotateZ(-28deg); }
  5% { -webkit-transform: rotateZ(34deg); }
  7% { -webkit-transform: rotateZ(-32deg); }
  9% { -webkit-transform: rotateZ(30deg); }
  11% { -webkit-transform: rotateZ(-28deg); }
  13% { -webkit-transform: rotateZ(26deg); }
  15% { -webkit-transform: rotateZ(-24deg); }
  17% { -webkit-transform: rotateZ(22deg); }
  19% { -webkit-transform: rotateZ(-20deg); }
  21% { -webkit-transform: rotateZ(18deg); }
  23% { -webkit-transform: rotateZ(-16deg); }
  25% { -webkit-transform: rotateZ(14deg); }
  27% { -webkit-transform: rotateZ(-12deg); }
  29% { -webkit-transform: rotateZ(10deg); }
  31% { -webkit-transform: rotateZ(-8deg); }
  33% { -webkit-transform: rotateZ(6deg); }
  35% { -webkit-transform: rotateZ(-4deg); }
  37% { -webkit-transform: rotateZ(2deg); }
  39% { -webkit-transform: rotateZ(-1deg); }
  41% { -webkit-transform: rotateZ(1deg); }

  43% { -webkit-transform: rotateZ(0); }
  100% { -webkit-transform: rotateZ(0); }
}

@-moz-keyframes ring {
  0% { -moz-transform: rotate(0); }
  1% { -moz-transform: rotate(30deg); }
  3% { -moz-transform: rotate(-28deg); }
  5% { -moz-transform: rotate(34deg); }
  7% { -moz-transform: rotate(-32deg); }
  9% { -moz-transform: rotate(30deg); }
  11% { -moz-transform: rotate(-28deg); }
  13% { -moz-transform: rotate(26deg); }
  15% { -moz-transform: rotate(-24deg); }
  17% { -moz-transform: rotate(22deg); }
  19% { -moz-transform: rotate(-20deg); }
  21% { -moz-transform: rotate(18deg); }
  23% { -moz-transform: rotate(-16deg); }
  25% { -moz-transform: rotate(14deg); }
  27% { -moz-transform: rotate(-12deg); }
  29% { -moz-transform: rotate(10deg); }
  31% { -moz-transform: rotate(-8deg); }
  33% { -moz-transform: rotate(6deg); }
  35% { -moz-transform: rotate(-4deg); }
  37% { -moz-transform: rotate(2deg); }
  39% { -moz-transform: rotate(-1deg); }
  41% { -moz-transform: rotate(1deg); }

  43% { -moz-transform: rotate(0); }
  100% { -moz-transform: rotate(0); }
}

@keyframes ring {
  0% { transform: rotate(0); }
  1% { transform: rotate(30deg); }
  3% { transform: rotate(-28deg); }
  5% { transform: rotate(34deg); }
  7% { transform: rotate(-32deg); }
  9% { transform: rotate(30deg); }
  11% { transform: rotate(-28deg); }
  13% { transform: rotate(26deg); }
  15% { transform: rotate(-24deg); }
  17% { transform: rotate(22deg); }
  19% { transform: rotate(-20deg); }
  21% { transform: rotate(18deg); }
  23% { transform: rotate(-16deg); }
  25% { transform: rotate(14deg); }
  27% { transform: rotate(-12deg); }
  29% { transform: rotate(10deg); }
  31% { transform: rotate(-8deg); }
  33% { transform: rotate(6deg); }
  35% { transform: rotate(-4deg); }
  37% { transform: rotate(2deg); }
  39% { transform: rotate(-1deg); }
  41% { transform: rotate(1deg); }

  43% { transform: rotate(0); }
  100% { transform: rotate(0); }
}


	.rotate {
  animation: rotation 8s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}

.navbar-light .navbar-nav .nav-link {
    color: #ae943f;;
}




</style>

	<button class="navbar-toggler"   type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse"  id="navbarNav" >
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item">
				<a class="nav-link" href="home.php"><span class='fa fa-user'></span> Welcome : <?php echo $_SESSION["login_info"]["ANAME"]; ?> </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="home.php"><span class='fa fa-home'></span> Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="add_reminder.php"><span class='fa fa-plus'></span> Add Ssl Expiry</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="add_event.php"><span class='fa fa-plus'></span> Add event</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>