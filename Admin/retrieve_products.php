<?php 

include("conn.php");

if (isset($_POST['btn-ret'])) {
//sql query to perform copying data from one table to another
$pro_id1 = $_GET['id'];
$sql_query  =  "INSERT product select * from archive_products where `pro_id` = $pro_id1 "; 
$sql_query1 = "DELETE from archive_products where `pro_id` = $pro_id1";
    if ($connection_link->query($sql_query) === true) 
{ 
    $connection_link->query($sql_query1);
    echo '<script language="javascript">';
	        echo 'alert("Products Retrieve to Recycle Bin");';
	        echo 'window.location="product.php";';
	        echo '</script>'; 
} 
else
{ 
    echo "ERROR: Could not able to proceed $sql_query. "
        .$connection_link->error; 
} 
}
// Close the  connection 
$connection_link->close(); 
?>