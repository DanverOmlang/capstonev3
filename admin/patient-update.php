<?php
include("../conn.php");
$id=$_GET['id'];
if (isset($_POST['btnsubmit'])) {
	$fname=$_POST['firstname'];
	$bday=$_POST['bday'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$medhx=$_POST['medhx'];
	$bp=$_POST['bp'];
	$type=$_POST['med'];
	//Distance
	$new_D_OD_SPH=$_POST['new_D_OD_SPH'];
	$new_D_OD_CYL=$_POST['new_D_OD_CYL'];
	$new_D_OD_AXIS=$_POST['new_D_OD_AXIS'];
	$new_D_OD_VA=$_POST['new_D_OD_VA'];
	$new_D_OD_ADD=$_POST['new_D_OD_ADD'];

	$new_D_OS_SPH=$_POST['new_D_OS_SPH'];
	$new_D_OS_CYL=$_POST['new_D_OS_CYL'];
	$new_D_OS_AXIS=$_POST['new_D_OS_AXIS'];
	$new_D_OS_VA=$_POST['new_D_OS_VA'];
	$new_D_OS_ADD=$_POST['new_D_OS_ADD'];
	//Contact Lens
	$new_CL_OD_SPH=$_POST['new_CL_OD_SPH'];
	$new_CL_OD_CYL=$_POST['new_CL_OD_CYL'];
	$new_CL_OD_AXIS=$_POST['new_CL_OD_AXIS'];
	$new_CL_OD_VA=$_POST['new_CL_MONO'];
	$new_CL_OD_ADD=$_POST['new_CL_MONO_OD'];

	$new_CL_OS_SPH=$_POST['new_CL_OS_SPH'];
	$new_CL_OS_CYL=$_POST['new_CL_OS_CYL'];
	$new_CL_OS_AXIS=$_POST['new_CL_OS_AXIS'];
	$new_CL_OS_VA=$_POST['new_CL_PD'];
	$new_CL_OS_ADD=$_POST['new_CL_PD_OS'];
	//Read
	$new_R_OD_SPH=$_POST['new_R_OD_SPH'];
	$new_R_OD_CYL=$_POST['new_R_OD_CYL'];
	$new_R_OD_AXIS=$_POST['new_R_OD_AXIS'];
	$new_R_OD_VA=$_POST['new_R_SEGHT'];
	$new_R_OD_ADD=$_POST['new_R_SEGHT_OD'];

	$new_R_OS_SPH=$_POST['new_R_OS_SPH'];
	$new_R_OS_CYL=$_POST['new_R_OS_CYL'];
	$new_R_OS_AXIS=$_POST['new_R_OS_AXIS'];
	$new_R_OS_VA=$_POST['new_R_VERHT'];
	$new_R_OS_ADD=$_POST['new_R_VERHT_OS'];

	$ishihara_SPH=$_POST['ishihara_SPH'];
	$ishihara_CYL=$_POST['ishihara_CYL'];
	$ishihara_AXIS=$_POST['ishihara_AXIS'];
	$ishihara_PD=$_POST['ishihara_PD'];
	$ishihara_PD_ADD=$_POST['ishihara_PD_ADD'];

	//inserting history
	$hid1=$_POST['hid1'];
	$hid2=$_POST['hid2'];	
	$hid3=$_POST['hid3'];
	$hid4=$_POST['hid4'];
	$hid5=$_POST['hid5'];
	$hid6=$_POST['hid6'];
	$hid7=$_POST['hid7'];
	$hid8=$_POST['hid8'];
	$hid9=$_POST['hid9'];
	$hid10=$_POST['hid10'];
	$hid11=$_POST['hid11'];
	$hid12=$_POST['hid12'];
	$hid13=$_POST['hid13'];
	$hid14=$_POST['hid14'];
	$hid15=$_POST['hid15'];
	$hid16=$_POST['hid16'];
	$hid17=$_POST['hid17'];
	$hid18=$_POST['hid18'];
	$hid19=$_POST['hid19'];
	$hid20=$_POST['hid20'];
	$hid21=$_POST['hid21'];
	$hid22=$_POST['hid22'];
	$hid23=$_POST['hid23'];
	$hid24=$_POST['hid24'];
	$hid25=$_POST['hid25'];
	$doctor=$_POST['doctor'];
	
if ($type=="Distance") {

	// code...
	$query = "UPDATE `patient_distancerx` SET `type`='$type',`patient_name`='$fname',`patient_bday`='$bday',`patient_contact`='$contact',`patient_email`='$email',`patient_address`='$address',`patient_medhx`='$medhx',`patient_bp`='$bp',`D_OD_SPH`='$new_D_OD_SPH',`D_OD_CYL`='$new_D_OD_CYL',`D_OD_AXIS`='$new_D_OD_AXIS',`D_OD_VA`='$new_D_OD_VA',`D_OD_ADD`='$new_D_OD_ADD',`D_OS_SPH`='$new_D_OS_SPH',`D_OS_CYL`='$new_D_OS_CYL',`D_OS_AXIS`='$new_D_OS_AXIS',`D_OS_VA`='$new_D_OS_VA',`D_OS_ADD`='$new_D_OS_ADD',`I_SPH`='$ishihara_SPH',`I_CYL`='$ishihara_CYL',`I_AXIS`='$ishihara_AXIS',`I_PD`='$ishihara_PD',`I_ADD`='$ishihara_PD_ADD',`doctor`='$doctor'  WHERE `patient_no`='$id'";
		//history
	
}	
elseif ($type=="Contact Lens") {

	$query = "UPDATE `patient_distancerx` SET `type`='$type',`patient_name`='$fname',`patient_bday`='$bday',`patient_contact`='$contact',`patient_email`='$email',`patient_address`='$address',`patient_medhx`='$medhx',`patient_bp`='$bp',`D_OD_SPH`='$new_CL_OD_SPH',`D_OD_CYL`='$new_CL_OD_CYL',`D_OD_AXIS`='$new_CL_OD_AXIS',`D_OD_VA`='$new_CL_OD_VA',`D_OD_ADD`='$new_CL_OD_ADD',`D_OS_SPH`='$new_CL_OS_SPH',`D_OS_CYL`='$new_CL_OS_CYL',`D_OS_AXIS`='$new_CL_OS_AXIS',`D_OS_VA`='$new_CL_OS_VA',`D_OS_ADD`='$new_CL_OS_ADD',`I_SPH`='$ishihara_SPH',`I_CYL`='$ishihara_CYL',`I_AXIS`='$ishihara_AXIS',`I_PD`='$ishihara_PD',`I_ADD`='$ishihara_PD_ADD',`doctor`='$doctor' WHERE `patient_no`='$id'";
		//history
	
}
elseif ($type=="Reading") {
	// code...
	$query = "UPDATE `patient_distancerx` SET `type`='$type',`patient_name`='$fname',`patient_bday`='$bday',`patient_contact`='$contact',`patient_email`='$email',`patient_address`='$address',`patient_medhx`='$medhx',`patient_bp`='$bp',`D_OD_SPH`='$new_R_OD_SPH',`D_OD_CYL`='$new_R_OD_CYL',`D_OD_AXIS`='$new_R_OD_AXIS',`D_OD_VA`='$new_R_OD_VA',`D_OD_ADD`='$new_R_OD_ADD',`D_OS_SPH`='$new_R_OS_SPH',`D_OS_CYL`='$new_R_OS_CYL',`D_OS_AXIS`='$new_R_OS_AXIS',`D_OS_VA`='$new_R_OS_VA',`D_OS_ADD`='$new_R_OS_ADD',`I_SPH`='$ishihara_SPH',`I_CYL`='$ishihara_CYL',`I_AXIS`='$ishihara_AXIS',`I_PD`='$ishihara_PD',`I_ADD`='$ishihara_PD_ADD',`doctor`='$doctor' WHERE `patient_no`='$id'";
	//history
	
}
else{
	$query = "UPDATE `patient_distancerx` SET `type`='$type',`patient_name`='$fname',`patient_bday`='$bday',`patient_contact`='$contact',`patient_email`='$email',`patient_address`='$address',`patient_medhx`='$medhx',`patient_bp`='$bp',`D_OD_SPH`='$new_D_OD_SPH',`D_OD_CYL`='$new_D_OD_CYL',`D_OD_AXIS`='$new_D_OD_AXIS',`D_OD_VA`='$new_D_OD_VA',`D_OD_ADD`='$new_D_OD_ADD',`D_OS_SPH`='$new_D_OS_SPH',`D_OS_CYL`='$new_D_OS_CYL',`D_OS_AXIS`='$new_D_OS_AXIS',`D_OS_VA`='$new_D_OS_VA',`D_OS_ADD`='$new_D_OS_ADD',`I_SPH`='$ishihara_SPH',`I_CYL`='$ishihara_CYL',`I_AXIS`='$ishihara_AXIS',`I_PD`='$ishihara_PD',`I_ADD`='$ishihara_PD_ADD',`doctor`='$doctor' WHERE `patient_no`='$id'";
		//history
	

}

	$query1 = "INSERT INTO `patient_history`(`patient_id`, `type`, `patient_name`, `patient_bday`, `patient_contact`, `patient_email`, `patient_address`, `patient_medhx`, `patient_bp`, `D_OD_SPH`, `D_OD_CYL`, `D_OD_AXIS`, `D_OD_VA`, `D_OD_ADD`, `D_OS_SPH`, `D_OS_CYL`, `D_OS_AXIS`, `D_OS_VA`, `D_OS_ADD`, `I_SPH`, `I_CYL`, `I_AXIS`, `I_PD`, `I_ADD`, `date_up`, `status`,`doctor`) VALUES ('$hid24','$hid8','$hid1','$hid2','$hid3','$hid4','$hid5','$hid6','$hid7','$hid9','$hid10','$hid11','$hid12','$hid13','$hid14','$hid15','$hid16','$hid17','$hid18','$hid19','$hid20','$hid21','$hid22','$hid23',now(),'History','$hid25')";

	mysqli_query($conn, $query);
	mysqli_query($conn, $query1);
		header("Location:patient-view.php?id=".$_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css\sys_style.css">
	<link rel="shorcut icon" type="img/png" href="images\logo.png">
	<title>RNL Vision Care | Admin</title>
	<style>
	input[type=text], input[type=date], input[type=tel], input[type=email], select, textarea {
  		width: 100%;
  		padding: 12px;
  		border: 1px solid #ccc;
  		border-radius: 4px;
  		resize: vertical;
  		font-family: var(poppins);
	}

	label {
  		padding: 12px 12px 12px 0;
  		display: inline-block;
	}

	input[type=submit] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 33px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	float: right;
	}

	input[type=button] {
	background-color: red;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	float: right;
	margin-right: 120px;
	margin-top: -39px;
	width: 110px;
	}

	input[type=submit]:hover {
	background-color: #00c2cb;
	}

	input[type=button]:hover {
	background-color: #00c2cb;
	}
	.container {
	border-radius: 5px;
	background-color: #f2f2f2;
	padding: 20px;
	}

	.col-25 {
	float: left;
	width: 25%;
	margin-top: 6px;
	}

	.col-75 {
	float: left;
	width: 75%;
	margin-top: 6px;
	}

	/* Clear floats after the columns */
	.row:after {
	content: "";
	display: table;
	clear: both;
	}

	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
	.col-25, .col-75, input[type=submit], input[type=button] {
		width: 100%;
		margin-top: 0;
	}
	}

</style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="images\logo.png" alt="" width="60px;">
			<span class="text" style="text-shadow:0.5px 0px #000;">RNL Vision Care</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="patient-record.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patient Record</span>
				</a>
			</li>
			<li>
				<a href="point-of-sale.php">
					<i class='bx bxs-cart' ></i>
					<span class="text">Point of Sale</span>
				</a>
			</li>
			<li>
				<a href="sales-report.php">
					<i class='bx bxs-download' ></i>
					<span class="text">Sales Report</span>
				</a>
			</li>
			<li>
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Product</span>
				</a>
			</li>
			<li>
				<a href="supplier.php">
					<i class='bx bxs-truck' ></i>
					<span class="text">Supplier</span>
				</a>
			</li>
			<li>
				<a href="manage-user.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Manage User</span>
				</a>
			</li>
			<li>
				<a href="audit.php">
					<i class='bx bxs-book' ></i>
					<span class="text">Audit Logs</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<div id="digital-clock"></div>
			<input type="checkbox" id="switch-mode" hidden>
			<script src="time.js"></script>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<!-- DROP DOWN NG EDIT PROFILE AND CHANGE PASS OK-->
			<div class="dropdown1">
			<img src="img\user.png" alt="" width="40px" class="userlogo">
				<div class="dropdown-content1">
					<a href="#" id="myBtn">Change Password</a>
					<a href="#" style="color:red;">Logout</a>
				</div>
			</div>
			<!-- Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
				<span class="close">&times;</span>
				<h3>CHANGE PASSWORD</h3>
				<br><hr><br>
				<h4>OLD PASSWORD</h4>
				<input type="text" class="oldpw">
				<h4>NEW PASSWORD</h4>
				<input type="text" class="newpw">
				<h4>CONFIRM PASSWORD</h4>
				<input type="text" class="conpw">
				<input type="button" value="Submit" class="cpBtn"><br><br><br><br>
				</div>
			</div>
			<script src="js\modal.js"></script>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Update Patient Record</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="patient-record.php">Back</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a href="">View Record</a>
						</li>
					</ul>
				</div>
			
			</div>

			
		<div class="table-data">
			<div class="order">
			
				<form method="post">
					<?php

$sql1 = "SELECT * FROM `patient_distancerx` WHERE `patient_no`='$id'";
 $result1 = $conn->query($sql1);  
  			if($result1->num_rows > 0){
  				while($row = $result1 -> fetch_assoc()){
  					$pat_id=$row['patient_id'];
  					$type=$row['type'];
  					$name=$row['patient_name'];
  					$bday=$row['patient_bday'];
  					$contact=$row['patient_contact'];
  					$email=$row['patient_email'];
  					$address=$row['patient_address'];
  					$medhx=$row['patient_medhx'];
  					$bp=$row['patient_bp'];

  					$D_OD_SPH=$row['D_OD_SPH'];
  					$D_OD_CYL=$row['D_OD_CYL'];
  					$D_OD_AXIS=$row['D_OD_AXIS'];
  					$D_OD_VA=$row['D_OD_VA'];
  					$D_OD_ADD=$row['D_OD_ADD'];

  					$D_OS_SPH=$row['D_OS_SPH'];
  					$D_OS_CYL=$row['D_OS_CYL'];
  					$D_OS_AXIS=$row['D_OS_AXIS'];
  					$D_OS_VA=$row['D_OS_VA'];
  					$D_OS_ADD=$row['D_OS_ADD'];

  					$I_SPH=$row['I_SPH'];
  					$I_CYL=$row['I_CYL'];
  					$I_AXIS=$row['I_AXIS'];
  					$I_PD=$row['I_PD'];
  					$I_ADD=$row['I_ADD'];

  					$dc=$row['doctor'];

  					
  				}}
?>
				<div class="row">
					<h3 style="text-transform: uppercase;"><?php echo $name;?></h3>
					<div class="row">
						<div class="col-25">
							<label for="firstname">Doctor</label>
						</div>
						<div class="col-75">
							<select name="doctor" id="doctor">
								<?php
								$sql2 = "SELECT * FROM `users_account` WHERE `users_roles` = 'Doctor'";
 						$result1 = $conn->query($sql2);  
						if($result1->num_rows > 0){
  						while($row = $result1 -> fetch_assoc()){
  							$firstn=$row['users_firstname'];
  							$lastn=$row['users_lastname'];
  							$dct="Dr. ".$firstn." ".$lastn;
								?>
								<option value="Dr. <?php echo $firstn.$lastn;?>"
									>Dr. <?php echo $firstn.$lastn; ?>
								</option>
								<?php
						}}
						?>
							</select>

						</div>
						</div>
						<div class="row">
						<div class="col-75">
							<input type="text" name="pat_id" value="<?php echo $id1; ?>" hidden>
							<input type="text" id="firstname" name="firstname" placeholder="Enter first name.." value="<?php echo $name;?>" hidden>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="bday">Birthdate</label>
						</div>
						<div class="col-75">
							<input type="date" id="bday" name="bday" value="<?php echo $bday;?>" required>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="contact">Contact No.</label>
						</div>
						<div class="col-75">
							<input type="tel" id="contact" name="contact" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" placeholder="Enter contact no.." value="<?php echo $contact;?>" required>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="email">Email</label>
						</div>
						<div class="col-75">
							<input type="email" id="email" name="email" placeholder="Enter email.." value="<?php echo $email;?>">
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="address">Address</label>
						</div>
						<div class="col-75">
							<input type="text" id="address" name="address" placeholder="Enter address.." value="<?php echo $address;?>" required>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="address">Medical Hx</label>
						</div>
						<div class="col-75">
							<textarea name="medhx" placeholder="Enter medical history" id="pat"><?php echo $medhx;?></textarea>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
							<label for="address">B.P.</label>
						</div>
						<div class="col-75">
							<input type="text" name="bp" placeholder="Enter blood pressure.." id="bp" value="<?php echo $bp;?>">
						</div>
						</div>
						<div class="row">
						<div class="col-25">
						</div>
						<style type="text/css">
							#divdis{
								display: none;
							}
							#divcl{
								display: none;
							}
							#divread{
								display: none;
							}
						</style>
						<div class="col-75">
							<input type="radio" name="med" value="Distance" id="chkdis" onclick="myFunction2()" <?php 
								if ($type=="Distance") {
									echo "checked";
								}
								?>> DISTANCE
								
							 <?php 
								if ($type=="Distance") {
									echo "<style type='text/css'>
									#divdis{
										display: block;
											}
									#divcl{
										display: none;
											}
									#divread{
										display: none;
											}
							
									</style>";

								}
							?>

							<input type="radio" name="med" value="Contact Lens" id="chkcl" onclick="myFunction3()" <?php 
								if ($type=="Contact Lens") {
									echo "checked";
								}
								?>> CONTACT LENS
								<?php 
								if ($type=="Contact Lens") {
									echo "<style type='text/css'>
									#divcl{
										display: block;
											}
									#divread{
										display: none;
											}
									#divdis{
										display: none;
											}
							
									</style>";
								}
							?>
							<input type="radio" name="med" value="Reading" id="chkread" onclick="myFunction4()"
							<?php 
								if ($type=="Reading") {
									echo "checked";
								}
								?>> READING
								<?php 
								if ($type=="Reading") {
									echo "<style type='text/css'>
									#divcl{
										display: none;
											}
									#divread{
										display: block;
											}
									#divdis{
										display: none;
											}
							
									</style>";
								}
							?>
						</div>
						</div>
						<!--script-->
						<script type="text/javascript">
								function myFunction2() {
 							 // Get the checkbox
 							 var checkBox = document.getElementById("chkdis");
 							 // Get the output text
							  var text = document.getElementById("divdis");
							  var text1 = document.getElementById("divcl");
							  var text2 = document.getElementById("divread");

 							 // If the checkbox is checked, display the output text
 							 if (checkBox.checked == true){
 							 	document.getElementById('d1').value = '';
 							 	document.getElementById('d2').value = '';
 							 	document.getElementById('d3').value = '';
 							 	document.getElementById('d4').value = '';
 							 	document.getElementById('d5').value = '';
 							 	document.getElementById('d6').value = '';
 							 	document.getElementById('d7').value = '';
 							 	document.getElementById('d8').value = '';
 							 	document.getElementById('d9').value = '';
 							 	document.getElementById('d10').value = '';

 							 	document.getElementById('cl1').value = '';
 							 	document.getElementById('cl2').value = '';
 							 	document.getElementById('cl3').value = '';
 							 	document.getElementById('cl4').value = '';
 							 	document.getElementById('cl5').value = '';
 							 	document.getElementById('cl6').value = '';
 							 	document.getElementById('cl7').value = '';
 							 	document.getElementById('cl8').value = '';
 							 	document.getElementById('cl9').value = '';
 							 	document.getElementById('cl10').value = '';

 							 	document.getElementById('r1').value = '';
 							 	document.getElementById('r2').value = '';
 							 	document.getElementById('r3').value = '';
 							 	document.getElementById('r4').value = '';
 							 	document.getElementById('r5').value = '';
 							 	document.getElementById('r6').value = '';
 							 	document.getElementById('r7').value = '';
 							 	document.getElementById('r8').value = '';
 							 	document.getElementById('r9').value = '';
 							 	document.getElementById('r10').value = '';

							    text.style.display = "block";
							    text1.style.display = "none";
							    text2.style.display = "none";
							  } 
							  else{
							  	text.style.display = "none";
							  }
							}
							function myFunction3() {
 							 // Get the checkbox
 							 var checkBox = document.getElementById("chkcl");
 							 // Get the output text
							  var text = document.getElementById("divcl");
							  var text1 = document.getElementById("divdis");
							  var text2 = document.getElementById("divread");

 							 // If the checkbox is checked, display the output text
 							 if (checkBox.checked == true){
 							 	document.getElementById('d1').value = '';
 							 	document.getElementById('d2').value = '';
 							 	document.getElementById('d3').value = '';
 							 	document.getElementById('d4').value = '';
 							 	document.getElementById('d5').value = '';
 							 	document.getElementById('d6').value = '';
 							 	document.getElementById('d7').value = '';
 							 	document.getElementById('d8').value = '';
 							 	document.getElementById('d9').value = '';
 							 	document.getElementById('d10').value = '';

 							 	document.getElementById('cl1').value = '';
 							 	document.getElementById('cl2').value = '';
 							 	document.getElementById('cl3').value = '';
 							 	document.getElementById('cl4').value = '';
 							 	document.getElementById('cl5').value = '';
 							 	document.getElementById('cl6').value = '';
 							 	document.getElementById('cl7').value = '';
 							 	document.getElementById('cl8').value = '';
 							 	document.getElementById('cl9').value = '';
 							 	document.getElementById('cl10').value = '';

 							 	document.getElementById('r1').value = '';
 							 	document.getElementById('r2').value = '';
 							 	document.getElementById('r3').value = '';
 							 	document.getElementById('r4').value = '';
 							 	document.getElementById('r5').value = '';
 							 	document.getElementById('r6').value = '';
 							 	document.getElementById('r7').value = '';
 							 	document.getElementById('r8').value = '';
 							 	document.getElementById('r9').value = '';
 							 	document.getElementById('r10').value = '';
							    text.style.display = "block";
							    text1.style.display = "none";
							    text2.style.display = "none";
							  } 
							  else{
							  	text.style.display = "none";
							  }
							}
							function myFunction4() {
 							 // Get the checkbox
 							 var checkBox = document.getElementById("chkread");
 							 // Get the output text
							  var text = document.getElementById("divread");
							  var text1 = document.getElementById("divcl");
							  var text2 = document.getElementById("divdis");
 							 // If the checkbox is checked, display the output text
 							 if (checkBox.checked == true){
 							 	document.getElementById('d1').value = '';
 							 	document.getElementById('d2').value = '';
 							 	document.getElementById('d3').value = '';
 							 	document.getElementById('d4').value = '';
 							 	document.getElementById('d5').value = '';
 							 	document.getElementById('d6').value = '';
 							 	document.getElementById('d7').value = '';
 							 	document.getElementById('d8').value = '';
 							 	document.getElementById('d9').value = '';
 							 	document.getElementById('d10').value = '';

 							 	document.getElementById('cl1').value = '';
 							 	document.getElementById('cl2').value = '';
 							 	document.getElementById('cl3').value = '';
 							 	document.getElementById('cl4').value = '';
 							 	document.getElementById('cl5').value = '';
 							 	document.getElementById('cl6').value = '';
 							 	document.getElementById('cl7').value = '';
 							 	document.getElementById('cl8').value = '';
 							 	document.getElementById('cl9').value = '';
 							 	document.getElementById('cl10').value = '';

 							 	document.getElementById('r1').value = '';
 							 	document.getElementById('r2').value = '';
 							 	document.getElementById('r3').value = '';
 							 	document.getElementById('r4').value = '';
 							 	document.getElementById('r5').value = '';
 							 	document.getElementById('r6').value = '';
 							 	document.getElementById('r7').value = '';
 							 	document.getElementById('r8').value = '';
 							 	document.getElementById('r9').value = '';
 							 	document.getElementById('r10').value = '';
							    text.style.display = "block";
							    text1.style.display = "none";
							    text2.style.display = "none";
							  } 
							  else{
							  	text.style.display = "none";
							  }
							}
							</script>
						<!--end of script-->
						<!--table for distance-->
						<div id="divdis">
						<div class="row">
						<div class="col-25">
							<label for="address">NEW RX</label>
						</div>
						<div class="col-75">
							<table>
								<thead>
								<tr>
									<th colspan="3">&nbsp</th>
									<th>SPH</th>
              						<th>CYL</th>
              						<th>AXIS</th>
              						<th>VA</th>
              						<th>ADD</th>
								</tr>
								<tr>
									<th rowspan="2"></th>
									<td rowspan="2">DISTANCE RX</td>
									<td>OD</td>
									<td><input type="text" name="new_D_OD_SPH" placeholder="Sphere" id="d1" value="<?php echo $D_OD_SPH;?>"></td>
              						<td><input type="text" name="new_D_OD_CYL" placeholder="Cylinder" id="d2" value="<?php echo $D_OD_CYL;?>"></td>
             						<td><input type="text" name="new_D_OD_AXIS" placeholder="Axis" id="d3" value="<?php echo $D_OD_AXIS;?>"></td>
              						<td><input type="text" name="new_D_OD_VA" placeholder="VA" id="d4" value="<?php echo $D_OD_VA;?>"></td>
              						<td><input type="text"name="new_D_OD_ADD" placeholder="ADD" id="d5" value="<?php echo $D_OD_ADD;?>"></td>
								</tr>
								<tr>
									<td>OS</td>
									<td><input type="text" name="new_D_OS_SPH" placeholder="Sphere" id="d6" value="<?php echo $D_OS_SPH;?>"></td>

             						 <td><input type="text" name="new_D_OS_CYL" placeholder="Cylinder" id="d7" value="<?php echo $D_OS_CYL;?>"></td>

             						 <td><input type="text" name="new_D_OS_AXIS" placeholder="Axis" id="d8" value="<?php echo $D_OS_AXIS;?>"></td>

             						 <td><input type="text" name="new_D_OS_VA" placeholder="VA" id="d9" value="<?php echo $D_OS_VA;?>"></td>

             						 <td><input type="text" name="new_D_OS_ADD" placeholder="ADD" id="d10" value="<?php echo $D_OS_ADD;?>"></td>
								</tr>
							</thead>
							</table>
						</div>
						</div>
						</div>
						<!--table for contact lens-->
						<div id="divcl">
						<div class="row">
						<div class="col-25">
							<label for="address">NEW RX</label>
						</div>
						<div class="col-75">
							<table>
								<thead>
								<tr>
									<th colspan="3">&nbsp</th>
									<th>SPH</th>
              						<th>CYL</th>
              						<th>AXIS</th>
              						<th>VA</th>
              						<th>ADD</th>
								</tr>
								<tr>
									<th rowspan="2"></th>
									<td rowspan="2">CONTACT LENS RX</td>
									<td>OD</td>
									<td><input type="text" name="new_CL_OD_SPH" placeholder="Sphere" id="cl1" value="<?php echo $D_OD_SPH;?>"></td>
              						<td><input type="text" name="new_CL_OD_CYL" placeholder="Cylinder" id="cl2" value="<?php echo $D_OD_CYL;?>"></td>
              						<td><input type="text" name="new_CL_OD_AXIS" placeholder="Axis" id="cl3" value="<?php echo $D_OD_AXIS;?>"></td>
             						<td><input type="text" name="new_CL_MONO"placeholder="MONO" id="cl4" value="<?php echo $D_OD_VA;?>"></td>
            						<td><input type="text" name="new_CL_MONO_OD" placeholder="ADD" id="cl5" value="<?php echo $D_OD_ADD;?>"></td>
								</tr>
								<tr>
									<td>OS</td>
									<td><input type="text"  name="new_CL_OS_SPH" placeholder="Sphere" id="cl6" value="<?php echo $D_OS_SPH;?>"></td>
              						<td><input type="text"  name="new_CL_OS_CYL" placeholder="Cylinder" id="cl7" value="<?php echo $D_OS_CYL;?>"></td>
              						<td><input type="text"  name="new_CL_OS_AXIS" placeholder="Axis" id="cl8" value="<?php echo $D_OS_AXIS;?>"></td>
              						<td><input type="text" name="new_CL_PD" placeholder="PD" id="cl9" value="<?php echo $D_OS_VA;?>"></td>
 						            <td><input type="text" name="new_CL_PD_OS"  placeholder="ADD" id="cl10" value="<?php echo $D_OS_ADD;?>"></td>
								</tr>
							</thead>
							</table>
						</div>
						</div>
						</div>
						<!--table for reading-->
						<div id="divread">
						<div class="row">
						<div class="col-25">
							<label for="address">NEW RX</label>
						</div>
						<div class="col-75">
							<table>
								<thead>
								<tr>
									<th colspan="3">&nbsp</th>
									<th>SPH</th>
              						<th>CYL</th>
              						<th>AXIS</th>
              						<th>VA</th>
              						<th>ADD</th>
								</tr>
								<tr>
									<th rowspan="2"></th>
									<td rowspan="2">READING RX</td>
									<td>OD</td>
									<td><input type="text" name="new_R_OD_SPH" placeholder="Sphere" id="r1" value="<?php echo $D_OD_SPH;?>"></td>
             						<td><input type="text" name="new_R_OD_CYL" placeholder="Cylinder" id="r2" value="<?php echo $D_OD_CYL;?>"></td>
              						<td><input type="text" name="new_R_OD_AXIS" placeholder="Axis" id="r3" value="<?php echo $D_OD_AXIS;?>"></td>
              						<td><input type="text" name="new_R_SEGHT" placeholder="SEG HT" id="r4" value="<?php echo $D_OD_VA;?>"></td>
              						<td><input type="text" name="new_R_SEGHT_OD" placeholder="ADD" id="r5" value="<?php echo $D_OD_ADD;?>"></td>
								</tr>
								<tr>
									<td>OS</td>
									<td><input type="text" name="new_R_OS_SPH" placeholder="Sphere" id="r6" value="<?php echo $D_OS_SPH;?>"></td>
              						<td><input type="text" name="new_R_OS_CYL" placeholder="Cylinder" id="r7" value="<?php echo $D_OS_CYL;?>"></td>
              						<td><input type="text" name="new_R_OS_AXIS" placeholder="Axis" id="r8" value="<?php echo $D_OS_AXIS;?>"></td>
             						<td><input type="text" name="new_R_VERHT" placeholder="VER HT" id="r9" value="<?php echo $D_OS_VA;?>"></td>
              						<td><input type="text" name="new_R_VERHT_OS" placeholder="ADD" id="r10" value="<?php echo $D_OS_ADD;?>"></td>
								</tr>
							</thead>
							</table>
						</div>
						</div>
						</div>
						<!--table for isihara-->
						<div id="ishi">
						<div class="row">
						<div class="col-25">
							<label for="address">Ishihara</label>
						</div>
						<div class="col-75">
							<table>
								<thead>
								<tr>
									<th>SPH</th>
              						<th>CYL</th>
              						<th>AXIS</th>
              						<th>VA</th>
              						<th>ADD</th>
								</tr>
								<tr>
									<td ><input type="text" name="ishihara_SPH" placeholder="Sphere" value="<?php echo $I_SPH;?>"></td>
									<td ><input type="text" name="ishihara_CYL" placeholder="Cylinder" value="<?php echo $I_CYL;?>"></td>
            						<td ><input type="text" name="ishihara_AXIS" placeholder="Axis" value="<?php echo $I_AXIS;?>"></td>
            						<td><input type="text" name="ishihara_PD" placeholder="P.D." value="<?php echo $I_PD;?>"></td>
            						<td><input type="text" name="ishihara_PD_ADD" placeholder="ADD" value="<?php echo $I_ADD;?>"></td>
								</tr>
							</thead>
							</table>
						</div>
						</div>
						</div>


						<div class="row">
						<input type="submit" value="Update" name="btnsubmit">
						</div>
						<div class="row">
						<a href="patient-record.php"><input type="button" value="Cancel"></a>
						</div>
	<input type="text" name="hid1" value="<?php echo $name;?>" hidden>
	<input type="date" name="hid2" value="<?php echo $bday;?>" hidden>
	<input type="text" name="hid3" value="<?php echo $contact;?>" hidden>
	<input type="text" name="hid4" value="<?php echo $email;?>" hidden>
	<input type="text" name="hid5" value="<?php echo $address;?>" hidden>
	<input type="text" name="hid6" value="<?php echo $medhx;?>" hidden>
	<input type="text" name="hid7" value="<?php echo $bp;?>" hidden>
	<input type="text" name="hid8" value="<?php echo $type;?>" hidden>
	<input type="text" name="hid9" value="<?php echo $D_OD_SPH;?>" hidden>
	<input type="text" name="hid10" value="<?php echo $D_OD_CYL;?>" hidden>
	<input type="text" name="hid11" value="<?php echo $D_OD_AXIS;?>" hidden>
	<input type="text" name="hid12" value="<?php echo $D_OD_VA;?>" hidden>
	<input type="text" name="hid13" value="<?php echo $D_OD_ADD;?>" hidden>
	<input type="text" name="hid14" value="<?php echo $D_OS_SPH;?>" hidden>
	<input type="text" name="hid15" value="<?php echo $D_OS_CYL;?>" hidden>
	<input type="text" name="hid16" value="<?php echo $D_OS_AXIS;?>" hidden>
	<input type="text" name="hid17" value="<?php echo $D_OS_VA;?>" hidden>
	<input type="text" name="hid18" value="<?php echo $D_OS_ADD;?>" hidden>
	<input type="text" name="hid19" value="<?php echo $I_SPH;?>" hidden>
	<input type="text" name="hid20" value="<?php echo $I_CYL;?>" hidden>
	<input type="text" name="hid21" value="<?php echo $I_AXIS;?>" hidden>
	<input type="text" name="hid22" value="<?php echo $I_PD;?>" hidden>
	<input type="text" name="hid23" value="<?php echo $I_ADD;?>" hidden>
	<input type="text" name="hid24" value="<?php echo $pat_id;?>" hidden>
	<input type="text" name="hid25" value="<?php echo $dc;?>" hidden>
				</form>
			</div>
	    </div>	
	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>