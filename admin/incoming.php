<?php
error_reporting(0);
session_start();
include('../admin/connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = $_POST['date'];
$cat = $_POST['cat'];
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM product WHERE pro_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['sellingprice'];
$code=$row['model'];
$gen=$row['brand'];
$name=$row['category'];
$p=$row['profit'];
$qq=$row['qty'];
}

//edit qty
$sql = "UPDATE product 
        SET qty=qty-?
        WHERE pro_id=?";

$q = $db->prepare($sql);
$q->execute(array($c,$b));
$fffffff=$asasa-$discount;
$d=$fffffff*$c;
$profit=$p*$c;
// query
if (empty($b)) {
    echo "<script>alert('Please select product')
    window.location.href='point-of-sale.php?id=$w&invoice=$a'</script>";
    
}
elseif ($c>$qq) {
   echo "<script>alert('Quantity insufficient')
    window.location.href='point-of-sale.php?id=$w&invoice=$a'</script>";
}
else{
$sql = "INSERT INTO sales_order (order_no,product,qty,amount,price,profit,model,brand,category,date) VALUES (:a,:b,:c,:d,:f,:h,:i,:j,:e,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':e'=>$name,':k'=>$date));
header("location: point-of-sale.php?id=$w&invoice=$a");
}

?>