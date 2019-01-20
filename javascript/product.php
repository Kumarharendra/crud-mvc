  <?php include('../site.config.inc.php');
  isLogin(); ?>

<?php
if(isset($_POST['action']) && $_POST['action'] == 'add'){
$sql="INSERT INTO product(product_name) VALUES('".$_POST['product_name']."')";
runQuery($db,$sql);
$_SESSION['msgs'] = '<div class="alert-box success"><span>Success: </span><b>Product Added Successfully</b></div>';
?>
<script>window.location.href="product.php";</script>
<?php
}


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
<meta name="author" content="">
<title>Cleanses | Rejuvenation, Green Renew, Immune Booster Cleanses | Chaser's Juice Cleanse delivery</title>
<meta name="description" content="">
<meta name="keywords" content="">
<!-- SEO Part -->

<meta name= "author" content="Vacation Rentals Website">
<!--css link file-->
<link href="<?php echo Site_url; ?>assets/backend/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo Site_url; ?>assets/backend/css/animated.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link href="<?php echo Site_url; ?>assets/backend/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo Site_url; ?>assets/backend/font/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo Site_url; ?>assets/backend/css/style.css" rel="stylesheet">
<link href="<?php echo Site_url; ?>assets/backend/css/responsive.css" rel="stylesheet">
<link rel="icon" href="<?php echo Site_url; ?>assets/backend/img/favicon.ico" type="image/gif/ico">
<!--css link file-->
</head>
<body>
<!--*******************************************************************-->


<?php include('include/header.php') ?>
<div class="container-fluid main-container">
<?php include('include/sidebar.php'); ?>
<div class="col-md-10 content">
<?php echo msgs(); ?>
<div class="panel panel-default">
<div class="panel-heading panel-heading-admin">
<div class="row">
<div class="col-md-6">
<h3>Product</h3>
</div>


<div class="col-md-12">
  <div class="container-fluid">
  <div class="row">

    <div class="product-admin-three-button">
<button type="button" class="btn btn-primary fa fa-plus pull-right" data-toggle="modal" data-target="#myModal"> Add Products</button>

</div>
</div>

<div class="row">
  <div class="panel-body">

<table id="example" class="display responsive nowrap" style="width:100%">
<thead>
<tr>
<th>Product Name</th>
<th class="pull-right">Action</th>

</tr>
</thead>
<tbody>

<?php
$fetch="SELECT * FROM product ORDER BY  product_name ASC ";
$productData=fetchAsoc($db,$fetch);
foreach ($productData as $product) {


?>
<tr>


  <?php if($product['product_id'] == 15){ ?>
<td><?php echo str_replace("-", "", $product['product_name']); ?></td>
<td class="pull-right">
   <a href="signaturemixes.php" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Content</a>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-warning fa fa-pencil edit_btn">
  Edit Product Name</button>
<?php if($product['status'] == 1){ ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-defult fa fa-ban offline_btn"> Make Offline</button>
<?php }else{ ?>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-success fa fa-check online_btn"> Make Online</button>
<?php } ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-danger fa fa-trash delete_btn">  Delete</button></td>
</tr>
<?php }else if($product['product_id'] == 14){ ?>
<td><?php echo str_replace("-", "", $product['product_name']); ?></td>
<td class="pull-right">
   <a href="singleflavours.php" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Content</a>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-warning fa fa-pencil edit_btn">
  Edit Product Name</button>
<?php if($product['status'] == 1){ ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-defult fa fa-ban offline_btn"> Make Offline</button>
<?php }else{ ?>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-success fa fa-check online_btn"> Make Online</button>
<?php } ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-danger fa fa-trash delete_btn">  Delete</button></td>
</tr>





<?php }else{ ?>




<td><?php echo str_replace("-", "", $product['product_name']); ?></td>
<td class="pull-right">
   <a href="product-content_edit.php?pid=<?php echo $product['product_id'];?>&action=edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Content</a>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-warning fa fa-pencil edit_btn">
  Edit Product Name</button>
<?php if($product['status'] == 1){ ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-defult fa fa-ban offline_btn"> Make Offline</button>
<?php }else{ ?>

<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-success fa fa-check online_btn"> Make Online</button>
<?php } ?>
<button type="button" id="<?php echo $product['product_id']; ?>" class="btn btn-danger fa fa-trash delete_btn">  Delete</button></td>
</tr>

<?php } }?>

</tbody>
</table>
</div>

</div>

</div>
</div>

</div>

</div>

</div>
</div>
<?php include('include/footer.php'); ?>
</div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Product</h4>
</div>

<div class="modal-body">
<form action="" name="myForm" method="post" onsubmit="return valid()">
<div class="row">
<div class="col-md-8">
<input type="text" name="product_name" class="form-control" id="add" placeholder="Enter Product Name">
</div>
<div class="col-md-4">
<button class="btn btn-success" type="submit" name="action"  value="add">Add</button>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" n class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

<div id="editmodel" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Update Product</h4>
</div>

<div class="modal-body">
<form action="" name="editform" id="editform" method="post">
<div class="row">
<div id="result"></div>
<input type="hidden" name="action" value="update">


<div class="col-md-4">
<button class="btn btn-primary" style="margin: 5px;" type="submit" name="action"  value="update">Update</button>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" n class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>





<!--*******************************************************************-->
<script type="text/javascript" src="<?php echo Site_url; ?>assets/backend/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Site_url; ?>assets/backend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Site_url; ?>assets/backend/js/owl.carousel.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
$(function () {
$('.navbar-toggle-sidebar').click(function () {
$('.navbar-nav').toggleClass('slide-in');
$('.side-body').toggleClass('body-slide-in');
$('#search').removeClass('in').addClass('collapse').slideUp(200);
});

$('#search-trigger').click(function () {
$('.navbar-nav').removeClass('slide-in');
$('.side-body').removeClass('body-slide-in');
$('.search-input').focus();
});
});
</script>



<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable({
  responsive:true
});
} );
</script>
<script>
function valid() {
var x = document.forms["myForm"]["add"].value;
if (x == "") {
alert("Please Enter Product Name");
return false;
}
}
</script>


<script>
  $(document).ready(function() {
    $(document).on("click",".offline_btn",function(event){
      event.preventDefault();
      var product_id = $(this).attr('id');
      var action = "offline";
      $.ajax({
        url: "ajax/ajax_file.php",
        method: "post",
        data: {"product_id": product_id,action},
        success:function(res){
          alert(res);
          window.location.reload();
        }
      });
    });

    $(document).on("click",".online_btn",function(event){
      event.preventDefault();
      var product_id = $(this).attr('id');
      var action = "online";
      $.ajax({
        url: "ajax/ajax_file.php",
        method: "post",
        data: {"product_id": product_id,action},
        success:function(res){
          alert(res);
          window.location.reload();
        }
      });
    });

    $(document).on("click",".delete_btn",function(event){
      event.preventDefault();
      var product_id = $(this).attr('id');
      var action = "delete";
      if(confirm('Are you want to delete?')== true){
      $.ajax({
        url: "ajax/ajax_file.php",
        method: "post",
        data: {"product_id": product_id,action},
        success:function(res){
          alert(res);
          window.location.reload();
        }
      });
    }else{
      return false;
    }
    });


     $(document).on("click",".edit_btn",function(event){
      event.preventDefault();
      var product_id = $(this).attr('id');
      var action = "edit";
      $.ajax({
        url: "ajax/ajax_file.php",
        method: "post",
        data: {"product_id": product_id,action},
        success:function(res){
          $("#result").html(res);
          $("#editmodel").modal("show");
        }
      });

    });

    $("#editform").on("submit",function(event){
    	event.preventDefault();
      var action = "update";
    	$.ajax({
    		url: "ajax/ajax_file.php",
    		method: "post",
    		data: $("#editform").serialize(),
    		success:function(data){
    			alert(data);
          window.location.reload();
    		}
    	});
    });

  });
</script>


<!--meta-tag-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#characterLft').text('70 characters left');
    $('#title').keyup(function () {
        var max = 70;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLft').text('You have reached the limit');
            $('#characterLft').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterLft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLft').removeClass('red');
        }
    });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#characterLeft').text('160 characters left');
    $('#message').keyup(function () {
        var max = 160;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');
        }
    });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#characterkey').text('200 characters left');
    $('#keyword').keyup(function () {
        var max = 200;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterkey').text('You have reached the limit');
            $('#characterkey').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterkey').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterkey').removeClass('red');
        }
    });
});
</script>
<!--meta-tag-->

</body></html>