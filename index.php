<?php
session_start();
include("db.php");
if((!isset($_SESSION['abc'])) && (!isset($_SESSION['Password']))){
header('Location: index.php');
}
if(isset($_REQUEST['addproduct']))
{
$subcategory=$_REQUEST['addsubcategory'];
$producttitle=$_REQUEST['producttitle'];
$productbrand=$_REQUEST['productbrand'];
$productprice=$_REQUEST['productprice'];

$adddesc=$_REQUEST['adddesc'];
$img=$_FILES['img']['name'];
$location="upload/".$img;
copy($_FILES['img']['tmp_name'], $location);

$query="insert into addproduct(`sub_id`,`producttitle`,`productbrand`,`productprice`,`img`,`adddesc`) values('$subcategory','$producttitle','$productbrand','$productprice','$img','$adddesc')";
$result = mysqli_query($conn, $query);

if($result){
  echo '<div class="alert alert-success" style="margin-bottom: 0;"><img src="images/thankyou.gif" width="50" align="center">
   <strong>Success!</strong> New Product Added
 </div>';
}
else {
  echo '<div class="alert alert-danger">
  <strong>Failed!</strong> Something Went Wrong.
</div>';
}
}
?>  