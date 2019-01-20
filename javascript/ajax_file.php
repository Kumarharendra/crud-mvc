<?php include('../../site.config.inc.php');

?>
<?php
if (isset($_POST['action']) && $_POST['action'] == 'offline') {
	$offlinequery = "UPDATE product SET status = 0 WHERE product_id = '".$_POST['product_id']."'";
	runQuery($db,$offlinequery);
	echo "Data updated successfully";die();
}
if (isset($_POST['action']) && $_POST['action'] == 'online') {
	$onlinequery = "UPDATE product SET status = 1 WHERE product_id = '".$_POST['product_id']."'";
	runQuery($db,$onlinequery);
	echo "Data updated successfully";die();
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
	$delquery = "DELETE FROM product WHERE product_id = '".$_POST['product_id']."'";
	runQuery($db,$delquery);
	echo "Data Deleted successfully";die();
}


if (isset($_POST['action']) && $_POST['action'] == 'edit') {
	$editQuery = "SELECT * FROM product WHERE product_id = '".$_POST['product_id']."'";
	$getData = fetchAsocRow($db,$editQuery);
	$output = "";
	
	
	$output .= "<div class='col-md-10'>";
	              $output .="<label>Product Name Edit</label>";
	
	$output .= "<input type='text' name='product_name' class='form-control' id='product_name'  value='".$getData['product_name']."'>";
	$output .="<label>Meta Title Edit</label>";

	$output .= "<input type='text' name='title' class='form-control' id='product_name'  value='".$getData['title']."'>";
    $output .="<label>Meta Description Edit</label>";
	$output .= "<input type='text' name='message' class='form-control' id='product_name' value='".$getData['message']."'>";
	$output .="<label>Meta Keyword Edit</label>";
	$output .= "<input type='text' name='keyword' class='form-control' id='product_name' value='".$getData['keyword']."'>";
	$output .= "<input type='hidden' name='product_id' class='form-control' value='".$getData['product_id']."'>";
	
	$output .= "</div>";
	

	echo $output;	
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){
	$updateQuery = "UPDATE product SET product_name='".$_POST['product_name']."', title='".$_POST['title']."', message='".$_POST['message']."',keyword='".$_POST['keyword']."' WHERE product_id = '".$_POST['product_id']."'";
	runQuery($db,$updateQuery);
	echo 'Product Updated And Meta tag successfully';
}



?>