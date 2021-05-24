




<?php require_once "controllerUserData.php"; 
$Referer = mysqli_real_escape_string($con, $_GET['Referer']);
?>


<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}



?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>OBILX-ACCOUNT</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<style>
.brand-title{
	margin-left:30px;
	padding-top:10px;
}
.active{
	color:green;
}
 .fa-money{
   color:green;
   margin-top:10px;
   margin-left:10px;
 }
 .fa-line-chart{
	color:purple;
   margin-top:10px;
   margin-left:10px;
 }
 .fa-user-plus{
	color:yellow;
   margin-top:10px;
   margin-left:10px;
 }
 .fa fa-link{
 	color:green;
 }
 .mb-0{
     color:blue;
 }
.link{
	font-size: 12px;
	color:#000;
}
button{
	background:green;
	cursor:pointer;
	border-radius:18px;
}

button:hover{
	background:rgba(30% black 70% white);
}
input{
	width:100px;
}
</style>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/logo-icon.jpg" height="50" width="100"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
      		  <div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="brand-title"><a href="https://obilx.ga/"><img id="logo_img" src="vendors/images/logo-icon.jpg" height="40"            width="50"></a>
				
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-name"><span class="user-name"><?php echo $fetch_info['name'] ?></span></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					
						<a class="dropdown-item" href="https://obilx.ga/user/login-user.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		
		</div>
	</div>

	
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
					 <h3>Profile Details</h3>
					 <hr>
						<h5 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">
</div>
						</h5>
						<p class="font-12 max-width-300">
						Name:<h6><?php echo $fetch_info['name']?></h6></p>
						<p class="font-12 max-width-300">
						E-mail:<h6><?php echo $fetch_info['email']?></h6></p>
                        <p class="font-12 max-width-300">
						Phone Number:<h6><?php echo $fetch_info['phone']?></h6></p>
                        <p class="font-12 max-width-300">
						Country:<h6><?php echo $fetch_info['country']?></h6></p>
						
						<p class="font-12 max-width-300">
					   ACCOUNT STATUS:<h6 class="active"><?php echo $fetch_info['status']?><i class="fa fa-check"></i></h6>
					   </p>
						<hr>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id=""><i class="fa fa-line-chart fa-3x"></i>
</div>
							</div>
							<div class="widget-data">
								
								<div class="weight-600 font-14">Stage/Level</div>
								<div class="h4 mb-0"><?php echo $fetch_info['level']?></div>
							</div>
						</div>
					</div>
				</div>
					<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id=""><i class="fa fa-link fa-3x" ></i></div>
								
							</div>
							<div class="widget-data">
								<div class="weight-600 font-14">Referral Link</div>


								<input type="text" value="https://obilx.ga/user/signup-user.php?Referer=<?php echo $fetch_info['name']?>" id="myInput">

<!-- The button used to copy the text -->
<button onclick="myFunction()">Copy Link</button>
</div>
							</div>
						</div>
					</div>
				
               
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id=""><i class="fa fa-user-plus fa-3x" ></i></div>
								
							</div>
							<div class="widget-data">
								<div class="weight-600 font-14">Referral</div>
								<div class="h4 mb-0"><?php echo $total;?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id=""><i class="fa fa-money fa-3x"></i></div>
							</div>
							<div class="widget-data">
								<div class="weight-600 font-14">Balance</div>
								$<?php echo $fetch_info['amountearned'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Important Notice</h2>
                        <hr>
						<p>
                        PAYMENT METHODS
                        <hr>
                        <hr>
                        <div class="h5 mb-0" color="green" >1.Bank: Equity<br>
Paybill {only saf}: 247247<br>
Account:0460177304883<br></div>
             <div class="h5 mb-0" color="green" ><br>2.
PAYPAL<br></div></p>
					</div>
				</div>
			</div>
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				ObilX||<a href="https://wiz-code.com/" target="_blank">Developed by Wiz-code</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>

<script type="text/javascript">

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Link copied");
}

</script>
	
</body>
</html>