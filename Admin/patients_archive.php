<?php
error_reporting(0);
include("session.php");
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
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
</head>
<style>
	.btn-t {
		background-color: #00c2cb;
		border-radius: 5px;
		border:none;
		padding: 10px;
	}

	.btn-t:hover {
		background-color: #4CAF50;
	}
	.btn-p {
		background-color: #00c2cb;
		border-radius: 5px;
		border:none;
		padding: 10px;
		width: 100%;
	}

	.btn-p:hover {
		background-color: #4CAF50;
		color: black;
	}


	.cust{
		width: 320px;
		padding:5px;
		font-size:20px;
	}

	.sel {
		width: 400px;
		padding:5px;
		font-size:20px;
	}
	.num {
		width:100px;
		padding:5px;
		font-size:20px;
	}
	.btn-apph {
		background-color: #00c2cb;
		padding: 15px;
		border: none;
		border-radius: 10%;
		float: right;
		margin-left: 10px;

		
	}
	.btn-f, .btn-c {
		background-color: #00c2cb;
		border: none;
		border-radius: 10%;
		margin-left: 10px;
		padding:4px;
	}
	.btn-upd {
		background-color: #00c2cb;
		border: none;
		border-radius: 10%;
		padding:8px;
	}
	.btn-upd:hover { background-color: #4CAF50;}
	.btn-c:hover { background-color: red;}
	.btn-apph:hover { background-color: #00a2a3;}
	.btn-remove:hover { background-color: red;}
	.namee{
		margin-top: 4.5%;
	}
	.page{
		background-color: #00c2cb;
		padding: 12px;
		border: none;
		border-radius: 10%;
		color:white;
	}
	.page:hover { background-color:#00b2b3;}

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="point-of-sale.php" class="brand">
			<img src="images\logo.png" alt="" width="60px;">
			<span class="text" style="text-shadow:0.5px 0px #000; color: black;">RNL Vision Care</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="patient-record.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patient Record</span>
				</a>
			</li>
			<li>
				<a href="point-of-sale.php?id=cash&invoice=<?php echo $finalcode ?>">
					<i class='bx bxs-cart' ></i>
					<span class="text">Point of Sale</span>
				</a>
			</li>
			<li>
				<a href="sales-report.php">
					<i class='bx bxs-chart' ></i>
					<span class="text">Sales Report</span>
				</a>
			</li>
			<li>
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Product Inventory</span>
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
			<li>
				<a href="audit.php">
					<i class='bx bxs-phone' ></i>
					<span class="text">Client Inquiries</span>
				</a>
			</li>
			<li class = "active">
				<a href="archive.php">
					<i class='bx bxs-download' ></i>
					<span class="text">Back-up and Restore</span>
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

			</form>
			<div id="digital-clock"></div>
			<script src="time.js"></script>
			<h4><?php echo $_SESSION['users_username']; ?></h4>
			<div class="dropdown2">
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">
				<?php 
				$query = mysqli_query($conn, "SELECT COUNT(*) as total from product  WHERE qty <=10 AND pro_status ='2'");
					while($result=mysqli_fetch_array($query)){
					echo $result['total']; 
				}			
				?>
						  </span>			  
			</a>
			<?php

if (isset($_GET['eid'])) {
	$pro_id=$_GET['eid'];

	$query1 = "UPDATE `product` SET pro_status = '1' WHERE pro_id = '$pro_id'";
	mysqli_query($conn, $query1);
			}
			?>
			
				<div class="dropdown-content2">
					<h4 id="textnotif">Notification</h4><br><hr>
					
			<table>
			  
			  <?php
			$sql1 = "SELECT * FROM `product` WHERE pro_status='2' AND qty <=10 LIMIT 6";
			$result1 = $conn->query($sql1);  
  			if($result1->num_rows > 0){
  				while($row = $result1 -> fetch_assoc()){ 
					$qty = $row['qty'];
					$model = $row['model'];
			  ?>
			  <tr>
			  <th><h4 style="color: red;">Low Product:</h4></th>
			  <td><p><?php 
					if ($qty<=10) {
						echo "Model: " . $row['model'] ."&nbsp<br>";		
						echo "QTY: " . $row['qty'];
							}
			  ?>
				</p></td><td><a href="?eid=<?php echo $row['pro_id'];?>"><button class="btn-remove" name="btnremove" style="cursor: pointer;">Clear</button></a></td>
							</tr>
							<?php
				  }}
			  ?>
			  </table>

				</div>
			</div>
			<!-- DROP DOWN NG EDIT PROFILE AND CHANGE PASS OK-->
			<div class="dropdown1">
			<img src="img\user.png" alt="" width="40px" class="userlogo">
				<div class="dropdown-content1">
					<a href="#" id="myBtn">Change Password</a>
					<a href="logout.php" style="color:red;">Logout</a>
				</div>
			</div>
			<!-- Modal -->
			<div id="myModal" class="modal">
				<div class="modal-content">
				<form action="changepasshandler.php" method="POST">
				<span class="close">&times;</span>
				<h3>CHANGE PASSWORD</h3>
				<br><hr><br>
				<h4>OLD PASSWORD</h4>
				<input type="password" name="currentPassword" class="oldpw">
				<h4>NEW PASSWORD</h4>
				<input type="password" minlenght="6" name="newPassword" class="newpw">
				<h4>CONFIRM PASSWORD</h4>
				<input type="password" minlenght="6" name="confirmPassword" class="conpw">
				<button type="submit" value="Submit" name="submit" class="cpBtn">Submit</button><br><br><br><br>
				</div>
			</div>
</form>
			<script src="js\modal.js"></script>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Patients Archive</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="archive.php">Archive</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a  href="archive.php">Patients Archive</a>
						</li>
					</ul>
				</div>
			
			</div><br>
			
			<form method="post">
				<label>Search by:</label>
              <select name='search' id="price-sort" onchange="location = this.value;" style="padding: 12px;border: 1px solid #ccc;border-radius: 4px;font-family: var(poppins); width: 30%;">
                <option value='0' disabled selected>Select category..</option>
                <option value='?search=patientid' <?php if($_GET['search']=='patientid'){
                  echo "selected";
                } ?>>Patient ID</option>
                <option value='?search=name' <?php if($_GET['search']=='name'){
                  echo "selected";
                } ?>>Name</option>
                <option value='?search=contact' <?php if($_GET['search']=='contact'){
                  echo "selected";
                } ?>>Contact</option>
                <option value='?search=address' <?php if($_GET['search']=='address'){
                  echo "selected";
                } ?>>Address</option>
                
              </select>
						<input type="text" name="txtsearch" id="txtsearch" placeholder="Search" autocomplete="off" style="padding: 12px;border: 1px solid #ccc;border-radius: 4px;font-family: var(poppins); width: 50%;">
						<button  id="btnsearch" name="btnsearch" class="page" style="cursor: pointer;"><i class='bx bx-search' ></i></button>
			</form>
			
			<div>
				
				<div>
                
<div id="printing">
<table>
						<caption>LIST OF PATIENT</caption>
						<thead>
						<tr>						
							<th scope="col">Patient ID</th>
							<th scope="col">Name</th>
							<th scope="col">Contact No.</th>
							<th scope="col">Address</th>
							<th scope="col">Age</th>
							<th scope="col">Action</th>
						</tr>
				
						</thead>
						<tbody>
						<?php
	 
	 $limit=25;
	
	$page=isset($_GET['page']) ? $_GET['page']:1;
	$start=($page-1)*$limit;
	$search=$_POST['txtsearch'];
	 $sql2 =$conn->query("SELECT count(patient_id) AS id, `patient_id`,`patient_name`,`patient_contact`, `patient_address` FROM `archive_patients` WHERE `patient_id` LIKE '%$search%' OR `patient_name` LIKE '%$search%'  OR `patient_contact` LIKE'%$search%' OR `patient_address` LIKE'%$search%'  ");
	 

	if ($_GET['search']=='patientid') {
		$column="patient_id";

	}
	elseif ($_GET['search']=='name') {
		$column="patient_name";
		 
	}
	elseif ($_GET['search']=='contact') {
		$column="patient_contact";
		 
	}
	elseif ($_GET['search']=='address') {
		$column="patient_address";
		 
	}
	
	

	 if (isset($_POST['btnsearch'])) {
	$sql1 = "SELECT year(now())-year(`patient_bday`) AS age,`patient_no`,`patient_id`,`patient_name`,`patient_email`,`patient_contact`,`patient_address` FROM `archive_patients` WHERE `patient_id` LIKE '%$search%' OR `patient_name` LIKE'%$search%'  OR `patient_contact` LIKE'%$search%' OR `patient_address` LIKE'%$search%'  LIMIT $start, $limit ";
		}
	else{
			$sql1 = "SELECT  year(now())-year(`patient_bday`) AS age,`patient_no`,`patient_id`,`patient_name`,`patient_email`,`patient_contact`,`patient_address`  FROM `archive_patients` LIMIT $start, $limit ";
			$sql2 =$conn->query("SELECT count(patient_no) AS id FROM `archive_patients`");
		}
	$result2 = $sql2->fetch_all(MYSQLI_ASSOC);
			$total=$result2[0]['id'];
			$pages=ceil($total/$limit);
			$prev=$page-1;
			$next=$page+1;
	   $result1 = $conn->query($sql1);  
		  if($result1->num_rows > 0){
			  while($row = $result1 -> fetch_assoc()){ 

	 ?>
							<tr>
							
							<td data-label="Patient ID"><?php echo $row['patient_id'];?></td>
							<td data-label="Name"><?php echo $row['patient_name'];?></td>
							<td data-label="Contact No."><?php echo $row['patient_contact'];?></td>
							<td data-label="Address"><?php echo $row['patient_address'];?></td>
							<td data-label="Age"><?php echo $row['age'];?></td>
							<td data-label="Action"><form method="post" action="retrieve_patient.php?id=<?php echo $row['patient_no'];?>"><button class="btn-c" name="btnrem" style="cursor: pointer;width:100px;pad" onclick="return confirm('Are you sure you want to retrieve this patient information?')">Retrieve</button></form>
			  				</td>
							</tr>
							<?php
     	}}
     	$id=$_GET['id'];
		$sql2 = "SELECT * FROM `archive_patients` WHERE `patient_no`='$id'";
 		$result2 = $conn->query($sql2);  
  			if($result2->num_rows > 0){
  				while($row = $result2 -> fetch_assoc()){
  					$name=$row['patient_name'];
  					$pat_id=$row['patient_id'];
  				}}

     	?>
     	<form method="post">
     	<input type="text" name="idd" value="<?php echo $pat_id;?>" hidden>
    </form>
						</tbody>
					</table>

				<div><br><br>
				
			</div>

		
		</main>
		<main>
			
		
			
			<!-- <div class="table-data">
				
				<div class="order">
				<title>MySQL database restore using PHP</title> -->
<style>




.form-row {
	margin-bottom: 20px;
}

.input-file {

	padding: 10px;
	margin-top: 5px;
	border-radius: 2px;
}

.btn-action {
	background: #333;
	border: 0;
	padding: 10px 40px;
	color: #FFF;
	border-radius: 2px;
}

.response {
	padding: 10px;
	margin-bottom: 20px;
    border-radius: 2px;
}

.error {
    background: #fbd3d3;
    border: #efc7c7 1px solid;
}

.success {
    background: #cdf3e6;
    border: #bee2d6 1px solid;
}
</style>


 

		
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<?php
include("conn.php");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}

?>
	<script src="script.js"></script>
</body>
<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  background-color: #00c2cb;
  margin-top:50px;	
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
  background-color: #9dd1d4;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}</style>
</style>
</html>