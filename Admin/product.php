<?php
error_reporting(0);
include("../conn.php");
include("session.php");
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
	$pro_id1=$_GET['id'];
	$query = "DELETE FROM `product` WHERE pro_id='$pro_id1'";
	users_logs($_SESSION['users_username'], "Remove Product", date("Y-m-d h:i:sa"), $_SESSION['users_roles']);
			mysqli_query($conn, $query);
			echo "<script>alert('You have successfully remove the record.');</script>";
			echo "<script>document.location='product.php';</script>";
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
		cursor: pointer;
	}

	.btn-upd:hover { background-color: #4CAF50;}
	.btn-rem:hover { background-color: red;}
	.btn-print:hover { background-color:#00b2b3;}
	.btn-addp:hover { background-color: #00b2b3;}

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
		color:white;
	}
	.page:hover { background-color:#00b2b3;}

	.brandd{
		margin-top: 8%;
	}

	.namee{margin-top: 20%;}
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
	.btn-remove {
		background-color: #00c2cb;
		border: none;
		border-radius: 10%;
		margin-left: 60%;
		padding:8px;
	}
	.btn-remove:hover { background-color: red;}
	.btn-f:hover { background-color: #4CAF50;}
	.btn-c:hover { background-color: red;}
	.btn-apph:hover { background-color: #00a2a3;}
	
	.namee{
		margin-top: 4.5%;
	}

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="product.php" class="brand">
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
			<li class="active">
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
			<div class="dropdown2">
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">
				<?php 
				$query = mysqli_query($conn, "SELECT COUNT(*) as total from client_inquiries WHERE inquiries_status = '2'");
					while($result=mysqli_fetch_array($query)){
					echo $result['total']; 
				}			
				?>
						  </span>			  
			</a>
			<?php

			if (isset($_GET['id'])) {
			$users_id=$_GET['id'];
			$query = "UPDATE `client_inquiries` SET inquiries_status = '1'  WHERE inquiries_id = '$users_id'";
			mysqli_query($conn, $query);
			header( "refresh:0; url=product.php" );
			}
			?>
			
				<div class="dropdown-content2">
					<h4 id="textnotif">Notification</h4><br><hr>
					<?php   
			   require_once("../db/notification/notifdisplay.php");
              while($row = mysqli_fetch_assoc($query)){
				  
            ?>
			<table>
				<tr>
					<th><h4>Inquiry:</h4></th><p><td><?php echo $row['inquiries_message']; ?></p></td><td><a href="?id=<?php echo $row['inquiries_id'];?>"><button class="btn-remove" name="btnremove" style="cursor: pointer;">Clear</button></a></td><hr color="wheat">
			  </table>
					<?php
			  }
			  ?>
					<a href="see-all-notification.php" id="colnotif">See all notification..</a>
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
					<h1>Product Inventory</h1>
					<ul class="breadcrumb">
						<li>
							<a href="product.php">Product</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="product.php">Home</a>
						</li>
					</ul>
				</div>
			
			</div>

			<a href="product-add.php"><button class="btn-addp" style="float:right;">+ Add Product </button></a>
			<a href="javascript:Clickheretoprint()">
   	<button class="btn-addp" style="float:right; width: 100px;"><i class='bx bxs-printer' ></i> Print </button></a>
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
						<input type="text" name="txtsearch" id="txtsearch" placeholder="Search by Model/Category.." autocomplete="off" style="padding: 12px;border: 1px solid #ccc;border-radius: 4px;font-family: var(poppins); width: 50%;">
						<button  id="btnsearch" name="btnsearch" class="page" style="cursor: pointer;"><i class='bx bx-search' ></i></button>
			</form>
<div id="printing">
					<table>
<caption>List of Product</caption>
     <thead>
     	<tr>
     		<th>Model</th>
     	 <th>Brand</th>
     	 <th>Category</th>
     	 <th>Orig. Price</th>
		 <th>Selling Price</th>
		 <th>Exp. Date</th>
		 <th>Qty.</th>
		 <th>Action</th>
     	</tr>
     </thead>
     <tbody>
     	<?php
     	$limit=25;
        $cat=$_POST['all'];
        $page=isset($_GET['page']) ? $_GET['page']:1;
        $start=($page-1)*$limit;
        $search=$_POST['txtsearch'];
     	
     	if (isset($_POST['btnsearch'])) {
        $sql1 = "SELECT * FROM `product` WHERE `category` LIKE '%$search%' OR `model` LIKE '%$search%' OR `brand` LIKE '%$search%' OR `origprice` LIKE '%$search%' OR `sellingprice` LIKE '%$search%' OR `qty` LIKE '%$search%' LIMIT $start, $limit";
        $sql2 =$conn->query("SELECT count(pro_id) AS id,`category`,`model`,`brand`,`origprice`,`sellingprice`,`qty` FROM `product` WHERE `category` LIKE '%$search%' OR `model` LIKE '%$search%' OR `brand` LIKE '%$search%' OR `origprice` LIKE '%$search%' OR `sellingprice` LIKE '%$search%' OR `qty` LIKE '%$search%'");

        	}
        else{
        		$sql1 = "SELECT * FROM `product` LIMIT $start, $limit ";
        		$sql2 =$conn->query("SELECT count(pro_id) AS id FROM `product`");
        	}
        $result2 = $sql2->fetch_all(MYSQLI_ASSOC);
                $total=$result2[0]['id'];
                $pages=ceil($total/$limit);
                $prev=$page-1;
                $next=$page+1;
     	  $result1 = $conn->query($sql1);  
  			if($result1->num_rows > 0){
  				while($row = $result1 -> fetch_assoc()){ 
  					$qty=$row['qty'];

     	?>
     		
     	


     	  <tr>
     	  	<td data-label="Model"><?php echo $row['model'];?></td>
     	  	<td data-label="Brand"><?php echo $row['brand'];?></td>
     	  	<td data-label="Category"><?php echo $row['category'];?></td>
     	  	<td data-label="Orig."><?php echo $row['origprice'];?></td>
			  	<td data-label="Selling"><?php echo $row['sellingprice'];?></td>
			  	<td data-label="Expire"><?php echo $row['expdate'];?></td>
			  	<td data-label="Qty" id="qq"><?php echo $row['qty'];

							if ($qty<=10) {
								
						echo "<br><b><p style='color:red;'>CRITICAL</p></b>";
							}
							else
							{
								echo "";}

							 



			  ?>
			  	
			  </td>
			  	<td data-label="Action" id="butones"><a href="product-update.php?id=<?php echo $row['pro_id'];?>"><button class="btn-upd">Update</button></a><form  method = "post" action ="archive_products.php?id=<?php echo $row['pro_id'];?>"><button class="btn-rem" name="btnrem" id="btnrem" onclick="return confirm('Are you sure you want to remove this product?')">Remove</button></form	></td>
     	  </tr>
    
     	 <?php
     }}

     	?>
     


     </tbody>

   </table>
</div>
   <!--page-->
  	<br>
   <a class="page" id="pre" href="product.php?page=<?=$prev; ?>">< Prev</a>
    	  <?php  for($i=1; $i <=$pages ; $i++): ?>
    <a class="page" href="product.php?page=<?=$i; ?>"><?=$i; ?></a>
                      <?php endfor; ?>
    <a class="page" id="pnext" href="product.php?page=<?=$next; ?>">Next ></a>
	
	
					

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
<style>table {
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
}</style>
</html>