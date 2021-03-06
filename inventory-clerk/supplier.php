<?php
error_reporting(0);
include("../conn.php");
include("../admin/session.php");
include "logs_conn.php";
date_default_timezone_set('Asia/Manila');
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
if (isset($_GET['id'])) {
	$supp_id=$_GET['id'];
	$query = "DELETE FROM `supplier` WHERE supp_id='$supp_id'";
	users_logs($_SESSION['users_username'], "Remove Supplier", date("Y-m-d h:i:sa"), $_SESSION['users_roles']);
			mysqli_query($conn, $query);
			echo "<script>alert('You have successfully remove the record.');</script>";
			echo "<script>document.location='supplier.php';</script>";
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
</head>
<style>
		button {
		background-color: #00c2cb;
		padding: 12px;
		border: none;
		margin: 3px;
		border-radius: 10%;
	}

	.btn-upd:hover { background-color: #4CAF50;}
	.btn-rem:hover { background-color: red;}
	.btn-print:hover { background-color:#00a2a3;}
	.btn-addpt:hover { background-color: #00a2a3}
	.btn-addpt {float:right; margin-bottom: 20px;}
	.btn-print {
		margin-top: 20px;
		float: right;
		width: 10%;
	}
	.page{
		background-color: #00c2cb;
		padding: 12px;
		border: none;
		border-radius: 10%;
	}
	.page:hover { background-color:#00b2b3;}

	.namee{margin-top: 5%;}
</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="supplier.php" class="brand">
			<img src="images\logo.png" alt="" width="60px;">
			<span class="text" style="text-shadow:0.5px 0px #000; color: black;">RNL Vision Care</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Product Inventory</span>
				</a>
			</li>
			<li class="active">
				<a href="supplier.php">
					<i class='bx bxs-truck' ></i>
					<span class="text">Supplier</span>
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
					<h1>Supplier</h1>
					<ul class="breadcrumb">
						<li>
							<a href="supplier.php">Supplier</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="supplier.php">Home</a>
						</li>
					</ul>
				</div>
			
			</div>
<style>
	#content main .table-data .order table th {
		text-align: center;
	}
	</style>
			<a href="supplier-add.php"><button class="btn-addpt" style="cursor: pointer;"> + Add Supplier</button></a>
			<a href="javascript:Clickheretoprint()">	<button class="btn-addp" style="float:right; width: 100px; cursor: pointer;"><i class='bx bxs-printer' ></i> Print </button></a>
<!--print-->
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
	
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1000, height=1000, left=100, top=25"; 
  var content_vlue = document.getElementById("printing").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:9px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
   
}
</script>
		
				<form method="post">
					<label>Search by:</label>
              <select name='search' id="price-sort" onchange="location = this.value;" style="padding: 12px;border: 1px solid #ccc;border-radius: 4px;font-family: var(poppins); width: 30%;">
                <option value='0' disabled selected>Select category..</option>
                <option value='?search=company' <?php if($_GET['search']=='company'){
                  echo "selected";
                } ?>>Company name</option>
                <option value='?search=person' <?php if($_GET['search']=='person'){
                  echo "selected";
                } ?>>Contact person</option>
                <option value='?search=contact' <?php if($_GET['search']=='contact'){
                  echo "selected";
                } ?>>Contact no.</option>
              </select>
						<input type="text" name="txtsearch" id="txtsearch" placeholder="Search" autocomplete="off" style="padding: 12px;border: 1px solid #ccc;border-radius: 4px;font-family: var(poppins);width: 30%;">
						<button  id="btnsearch" name="btnsearch" class="page" style="cursor: pointer;"><i class='bx bx-search' ></i></button>
						</form></br>
						<div id='printing'>
					<table>
     <thead>
     	<tr>
		 
     	 <th>Company Name<form method=""><button class="up" value="up" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button>&nbsp<button class="down" value="down" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button></form></th>
		 <th>Contact Person<form method=""><button class="up" value="up1" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button>&nbsp<button class="down" value="down1" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button></form></th>
     	 <th>Contact No.<form method=""><button class="up" value="up2" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button>&nbsp<button class="down" value="down2" name="btn" style="width: 10%; height: 5%; padding: 0; margin: 0;">???</button></form></th>
		 <th>Description</th>
		 <th>Action</th>
     	</tr>
     </thead>
     <tbody>
	 <style type="text/css">
	 	.up{
	 		cursor: pointer;
	 	}
	 	.down{
	 		cursor: pointer;
	 	}
	 </style>
	 <?php
     	$limit=25;
        $cat=$_POST['all'];
        $page=isset($_GET['page']) ? $_GET['page']:1;
        $start=($page-1)*$limit;
        $search=$_POST['txtsearch'];
        if ($_GET['search']=='company') {
        	$column="supp_cname";
        	 
        }
        elseif ($_GET['search']=='person') {
        	$column="supp_contactperson";

        }
        elseif ($_GET['search']=='contact') {
        	$column="supp_contact";
        	 
        }
        else{

        }
     	
     	if (isset($_POST['btnsearch'])&& $_POST['txtsearch']!="") {
        $sql1 = "SELECT * FROM `supplier` WHERE `$column` LIKE '%$search%' LIMIT $start, $limit ";
        $sql2 =$conn->query("SELECT count(supp_id) AS id FROM `supplier`");
        	}
        	elseif ($_GET['btn']=='down') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_cname` DESC LIMIT $start, $limit ";
        		
        		echo "<style>.down{ background-color:red;}</style>";
        	}
        	elseif ($_GET['btn']=='up') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_cname` ASC LIMIT $start, $limit ";
        		
        		echo "<style>.up{ background-color:red;}</style>";
        	}
        	elseif ($_GET['btn']=='down1') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_contactperson` DESC LIMIT $start, $limit ";
        	
        		echo "<style>.down{ background-color:red;}</style>";
        	}
        	elseif ($_GET['btn']=='up1') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_contactperson` ASC LIMIT $start, $limit ";
        		
        		echo "<style>.up{ background-color:red;}</style>";
        	}
        	elseif ($_GET['btn']=='down2') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_contact` DESC LIMIT $start, $limit ";
        		
        		echo "<style>.down{ background-color:red;}</style>";
        	}
        	elseif ($_GET['btn']=='up2') {
        		$sql1 = "SELECT * FROM `supplier` Order by `supp_contact` ASC LIMIT $start, $limit ";
        		
        		echo "<style>.up{ background-color:red;}</style>";
        	}

        else{
        		$sql1 = "SELECT * FROM `supplier` LIMIT $start, $limit ";
        		$sql2 =$conn->query("SELECT count(supp_id) AS id FROM `supplier`");
        	}
        	$sql2 =$conn->query("SELECT count(supp_id) AS id FROM `supplier`");
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
     	  	
     	  	<td data-label="Company Name" class="namee"><?php echo $row['supp_cname'];?></td>
     	  	<td data-label="Contact Person"><?php echo $row['supp_contactperson'];?></td>
     	  	<td data-label="Contact No."><?php echo $row['supp_contact'];?></td>
			<td data-label="Description"><?php echo $row['supp_desc'];?></td>
			<td data-label="Action"><a href="supplier-update.php?id=<?php echo $row['supp_id'];?>"><button class="btn-f" style="cursor: pointer;">Update</button></a>
			<form method="POST" action="archive_supplier.php?id=<?php echo $row['supp_id'];?>"><button class="btn-c" name="btnrem" id="btnrem" style="cursor: pointer;" onclick="return confirm('Are you sure you want to remove this supplier?')">Remove</button></form></td>
     	  </tr>
    
     	 <?php
     	}}

     	?>

	
     </tbody>
	 
   </table>
 </div>
   <br>
  	
   <a class="page" id="pre" href="supplier.php?page=<?=$prev; ?>&btn=<?php echo $_GET['btn'] ?>">< Prev</a>
    	  <?php  for($i=1; $i <=$pages ; $i++): ?>
    <a class="page" href="supplier.php?page=<?=$i; ?>&btn=<?php echo $_GET['btn'] ?>"><?=$i; ?></a>
                      <?php endfor; ?>
    <a class="page" id="pnext" href="supplier.php?page=<?=$next; ?>&btn=<?php echo $_GET['btn'] ?>">Next ></a>
				</div>
				</div>
				</div>
			
			<div class="table-data">
	
				
				
			</div>
		</main>
		<!-- MAIN -->
	</section>

	
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
<style>
		.btn-f, .btn-c {
		background-color: #00c2cb;
		border: none;
		border-radius: 10%;
		margin-left: 10px;
		padding:4px;
	}

	.btn-f:hover { background-color: #4CAF50;}
	.btn-c:hover { background-color: red;}
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
  margin-top:20px;	
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
}
</style>
</html>
