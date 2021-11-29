<?php 
session_start();
include "../db_conn.php";

if (isset($_POST['id']) && isset($_POST['name'])
    && isset($_POST['email']) && isset($_POST['contact'])
    && isset($_POST['date_time']) && isset($_POST['purpose'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id = validate($_POST['id']);
    $name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $contact = validate($_POST['contact']);
    $date_time = validate($_POST['date_time']);
    $purpose = validate($_POST['purpose']);
	$user_data = 'email='. $email. '&name='. $name;


  if(isset($_GET['error3'])){
    if($_GET['error3'] == "emptyfields") {   //require all inputs
        echo '<h3 class="bg-danger text-center">Fill all fields, Please try again!</h3>';
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        header("Location: ../Appointment/appointment.php?error=Name is required&$user_data");
	    exit();
	}
	else if (empty($email)) {
		header("Location: ../Appointment/appointment.php?error=Email is required&$user_data");
	    exit();
  }else if(!preg_match("/^[0-9]*$/", $contact)){
      header("Location: ../Appointment/appointment.php?error=Invalid Contact Number&$user_data");
    exit();
  }else if(empty($contact)){
    header("Location: ../Appointment/appointment.php?error=Contact Number is required&$user_data");
  exit();
}
  else if(empty($date_time)){
    header("Location: ../Appointment/appointment.php?error=Date & Time is required&$user_data");
  exit();
	}else if(!between($purpose)) {
        header("Location: ../Appointment/appointment.php?error=Purpose is required&$user_data");
	    exit();
	}
  }
	else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM appointments WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../Appointment/appointment.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO appointments(id, name, email, contact, date_time, purpose) VALUES('$id', '$name', '$email', '$contact', '$date_time', '$purpose')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../Appointment/appointment.php?success=      Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../Appointment/appointment.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
}
  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>appointment</title>
<link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/style.css"/>
<script id="applicationScript" type="text/javascript" src="script/script.js"></script>
</head>
<body>
<div id="appointment">

	<div id="APPOINMENT_ck">
		<span>APPOINMENT</span>
	</div>
	<div id="Home____Appoinment_page_cl">
		<span>Home  »  Appoinment page</span>
	</div>
	<img id="Untitled_design_23_cm" src="Untitled_design_23_cm.png" srcset="Untitled_design_23_cm.png 1x, Untitled_design_23_cm@2x.png 2x">
		
	<svg class="Rectangle_103">
		<rect id="Rectangle_103" rx="0" ry="0" x="0" y="0" width="1920" height="296">
		</rect>
	</svg>
	<div id="RNL_Vision_Care_co">
		<span>RNL Vision Care</span>
	</div>
	<svg class="Line_14" viewBox="0 0 1920 1">
		<path id="Line_14" d="M 0 0 L 1920 0">
		</path>
	</svg>
	<div id="n_2021_RNL_Vision_Care_All_Rig_cq">
		<span>© 2021 RNL Vision Care All Rights Reserved</span>
	</div>
	<div id="n_09123456789_cr">
		<span>☏ 09123456789</span>
	</div>
	<div id="n_RNLVisionCaregmailcom_cs">
		<span>✉ RNLVisionCare@gmail.com</span>
	</div>
	<div id="Our_Social_Media___cx">
		<span>Our Social Media : </span>
	</div>

	<a href="https://www.instagram.com/explore/locations/105816414916277/rnl-vision-care-center-optical-clinic/">
		<img id="Untitled_design_19_cu" src="Untitled_design_19_cu.png" srcset="Untitled_design_19_cu.png 1x, Untitled_design_19@2x.png 2x">
		</a>
	
		<a href="https://www.facebook.com/RNL-Vision-Care-Center-Optical-Clinic-105816414916277">
		<img id="Untitled_design_17_cv" src="Untitled_design_17_cv.png" srcset="Untitled_design_17_cv.png 1x, Untitled_design_17@2x.png 2x">
		</a>
		
		<a href="https://twitter.com/shumart4">
		<img id="Untitled_design_18_cw" src="Untitled_design_18_cw.png" srcset="Untitled_design_18_cw.png 1x, Untitled_design_18@2x.png 2x">
		</a>
	<div id="Feedback_Us___cy">
		<span>Feedback Us ! </span>
	</div>
	<svg class="Rectangle_104">
		<rect id="Rectangle_104" rx="18" ry="18" x="0" y="0" width="485" height="55">
		</rect>
	</svg>
	<div id="Describe_your_issue_or_idea_c">
		<span>Describe your issue or idea..</span>
	</div>
	<svg class="Rectangle_105">
		<rect id="Rectangle_105" rx="18" ry="18" x="0" y="0" width="97" height="55">
		</rect>
	</svg>
	<div id="Send_c">
		<span>Send</span>
	</div>
	<svg class="Rectangle_107">
		<rect id="Rectangle_107" rx="20" ry="20" x="0" y="0" width="806" height="646">
		</rect>
	</svg>
	<form action="../Appointment/appointment.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
	<div id="FULL_NAME_db">
		<label>Full Name:</label><br>
			<input type="text" id="fname" name="fname" placeholder="Fullname"><br>
	</div>
	<div id="EMAIL_dc">
		<label>Email:</label><br>
		<input type="email" id="email" name="email" placeholder="Email"><br>
	</div>
	<div id="CONTACT__dd">
		<label>Contact No.:</label><br>
		<input type="text" id="contact" name="contact" placeholder="Contact No."><br>
	</div>
	<div id="ddmmyyyy_de">
		<label for="date">Date:</label><br>
  		<input type="date" id="birthdaytime" name="birthdaytime">
	</div>
	<div id="PURPOSE_df">
		<label>Purpose:</label><br>
		<input type="text" id="purpose" name="purpose" placeholder="Purpose"><br>
	</div>
	<div id="Set_Appointment_dh">
		<input type="submit" value="Set Appointment">
		</div>
        </form>
	<!-- </div>
		<div id="Calendar_Schedule_d">
			<input type="submit" id="date"value="Calendar Schedule">
		</div> -->
	<div id="AVAILABLE_TIME_FOR_TODAY___di">
		<span>AVAILABLE TIME FOR TODAY : </span>
	</div>
	<div id="n_00_AM_-_FREE_dj">
		<span>8:00 AM - </span><span style="color:rgba(0,255,85,1);">FREE</span>
	</div>
	<div id="n_30_AM_-_RESERVED_dk">
		<span>8:30 AM - </span><span style="color:rgba(255,125,125,1);">RESERVED</span>
	</div>
	<div id="n_00_AM_-_FREE_dl">
		<span>9:00 AM - </span><span style="color:rgba(0,255,85,1);">FREE</span>
	</div>
	<div id="n_30_AM_-_RESERVED_dm">
		<span>9:30 AM -</span><span style="color:rgba(255,125,125,1);"> RESERVED</span>
	</div>
	<div id="n_000_AM_-_FREE_dn">
		<span>10:00 AM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<div id="n_030_AM_-_RESERVED_do">
		<span>10:30 AM -</span><span style="color:rgba(255,125,125,1);"> RESERVED</span>
	</div>
	<div id="n_100_AM_-_FREE_dp">
		<span>11:00 AM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<div id="n_130_AM_-_RESERVED_dq">
		<span>11:30 AM -</span><span style="color:rgba(255,125,125,1);"> RESERVED</span>
	</div>
	<div id="n_200_PM_-_100_PM__LUNCH_BREAK_dr">
		<span>12:00 PM - 1:00 PM ( LUNCH BREAK )</span>
	</div>
	<div id="n_30_PM_-_RESERVED_ds">
		<span>1:30 PM - </span><span style="color:rgba(255,125,125,1);">RESERVED</span>
	</div>
	<div id="n_00_PM_-_FREE_dt">
		<span>2:00 PM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<div id="n_30_PM_-_RESERVED_du">
		<span>2:30 PM - </span><span style="color:rgba(255,125,125,1);">RESERVED</span>
	</div>
	<div id="n_00_PM_-_FREE_dv">
		<span>3:00 PM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<div id="n_30_PM_-_RESERVED_dw">
		<span>3:30 PM - </span><span style="color:rgba(255,125,125,1);">RESERVED</span>
	</div>
	<div id="n_00_PM_-_FREE_dx">
		<span>4:00 PM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<div id="n_30_PM_-_FREE_dy">
		<span>4:30 PM -</span><span style="color:rgba(0,255,85,1);"> FREE</span>
	</div>
	<svg class="Line_15" viewBox="0 0 705 1">
		<path id="Line_15" d="M 0 0 L 705 0">
		</path>
	</svg>
	<svg class="Line_16" viewBox="0 0 705 1">
		<path id="Line_16" d="M 0 0 L 705 0">
		</path>
	</svg>
	<div id="n_1__02__21_d">
		<span>11 / 02 / 21</span>
	</div>
	<div id="n_00_AM_-_FREE_d">
		<span>1:00 AM - </span><span style="color:rgba(0,255,85,1);">FREE</span>
	</div>
	<div id="Calendar_Schedule_d">
		<span>Calendar Schedule</span>
	</div>
	
	<svg class="Rectangle_1">
		<rect id="Rectangle_1" rx="0" ry="0" x="0" y="0" width="1920" height="168">
		</rect>
	</svg>
	<a href="../Home/home.html">
	<img id="Untitled_design_12_eh" src="Untitled_design_12_eh.png" srcset="Untitled_design_12_eh.png 1x, Untitled_design_12_eh@2x.png 2x">
		
	</a>
	<a href="../Home/home.html">
	<div id="RNL_Vision_Care_ei">
		<span>RNL Vision Care</span>
	</div>
	</a>
	<svg class="Icon_ionic-md-eye_ej" viewBox="2.25 7.383 53.692 36.194">
		<path id="Icon_ionic-md-eye_ej" d="M 29.09608459472656 7.3828125 C 16.89549827575684 7.3828125 6.516610145568848 14.86136245727539 2.25 25.47994995117188 C 6.516610145568848 36.09852981567383 16.89549827575684 43.57708740234375 29.09608459472656 43.57708740234375 C 41.29667282104492 43.57708740234375 51.67556381225586 36.09852981567383 55.94216918945312 25.47994995117188 C 51.67556381225586 14.86136245727539 41.29667282104492 7.3828125 29.09608459472656 7.3828125 Z M 29.09608459472656 37.54870223999023 C 22.38456153869629 37.54870223999023 16.89549827575684 32.11956405639648 16.89549827575684 25.47994995117188 C 16.89549827575684 18.8403377532959 22.38456153869629 13.41119575500488 29.09608459472656 13.41119575500488 C 35.8076057434082 13.41119575500488 41.29667282104492 18.8403377532959 41.29667282104492 25.47994995117188 C 41.29667282104492 32.11956405639648 35.8076057434082 37.54870223999023 29.09608459472656 37.54870223999023 Z M 29.09608459472656 18.2410945892334 C 25.06916999816895 18.2410945892334 21.77333450317383 21.50097846984863 21.77333450317383 25.47994995117188 C 21.77333450317383 29.45891952514648 25.06916999816895 32.71880722045898 29.09608459472656 32.71880722045898 C 33.12299346923828 32.71880722045898 36.41883087158203 29.45892524719238 36.41883087158203 25.47994995117188 C 36.41883087158203 21.5009765625 33.12299346923828 18.2410945892334 29.09608459472656 18.2410945892334 Z">
		</path>
	</svg>
	<div id="ABOUT">
		<span>ABOUT</span>
	</div>
	<a href="../Home/home.html">
	<div id="HOME_el">
		<span>HOME</span>
	</div>
	</a>
	<svg class="Rectangle_106">
		<rect id="Rectangle_106" rx="0" ry="0" x="0" y="0" width="1920" height="168">
		</rect>
	</svg>
	<a href="../Home/home.html">
	<img id="Untitled_design_12_eh" src="Untitled_design_12_eh.png" srcset="Untitled_design_12_eh.png 1x, Untitled_design_12_eh@2x.png 2x">
		
	</a>
	<a href="../Home/home.html">
	<div id="RNL_Vision_Care_ei">
		<span>RNL Vision Care</span>
	</div>
	</a>
	<svg class="Icon_ionic-md-eye_ej" viewBox="2.25 7.383 53.692 36.194">
		<path id="Icon_ionic-md-eye_ej" d="M 29.09608459472656 7.3828125 C 16.89549827575684 7.3828125 6.516610145568848 14.86136245727539 2.25 25.47994995117188 C 6.516610145568848 36.09852981567383 16.89549827575684 43.57708740234375 29.09608459472656 43.57708740234375 C 41.29667282104492 43.57708740234375 51.67556381225586 36.09852981567383 55.94216918945312 25.47994995117188 C 51.67556381225586 14.86136245727539 41.29667282104492 7.3828125 29.09608459472656 7.3828125 Z M 29.09608459472656 37.54870223999023 C 22.38456153869629 37.54870223999023 16.89549827575684 32.11956405639648 16.89549827575684 25.47994995117188 C 16.89549827575684 18.8403377532959 22.38456153869629 13.41119575500488 29.09608459472656 13.41119575500488 C 35.8076057434082 13.41119575500488 41.29667282104492 18.8403377532959 41.29667282104492 25.47994995117188 C 41.29667282104492 32.11956405639648 35.8076057434082 37.54870223999023 29.09608459472656 37.54870223999023 Z M 29.09608459472656 18.2410945892334 C 25.06916999816895 18.2410945892334 21.77333450317383 21.50097846984863 21.77333450317383 25.47994995117188 C 21.77333450317383 29.45891952514648 25.06916999816895 32.71880722045898 29.09608459472656 32.71880722045898 C 33.12299346923828 32.71880722045898 36.41883087158203 29.45892524719238 36.41883087158203 25.47994995117188 C 36.41883087158203 21.5009765625 33.12299346923828 18.2410945892334 29.09608459472656 18.2410945892334 Z">
		</path>
	</svg>
	<a href="../About/about.html">
	<div id="ABOUT_ek">
		<span>ABOUT</span>
	</div>
	</a>
	<a href="../Home/home.html">
	<div id="HOME_el">
		<span>HOME</span>
	</div>
	</a>
	<a href="../Services/services.html">
	<div id="SERVICES_em">
		<span>SERVICES</span>
	</div>
	</a>
	<a href="../Product/product.html">
	<div id="PRODUCT_en">
		<span>PRODUCT</span>
	</div>
	</a>
	<a href="../Appointment/appointment.php">
	<div id="APPOINTMENT_eo">
		<span>APPOINTMENT</span>
	</div>
	</a>
	<a href="../Login/login.html">
	<div id="LOGIN_ep">
		<span>LOGIN</span>
	</div>
	</a>
</div>
</body>
</html>