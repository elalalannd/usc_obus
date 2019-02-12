<?php require('nav.php');
session_start();
$connect = mysqli_connect("localhost", "root", "", "usc_obus");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>USC OBUS</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="container" style="width:60%;">
	<h2 align="center">USC Bookstore</h2>
    <?php
	$query = "SELECT * FROM products ORDER BY ID ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-3">
            <form method="post" action="shop.php?action=add&ID=<?php echo $row["ID"]; ?>">
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">&#8369 <?php echo $row["price"]; ?></h5>
            <input type="number" name="quantity" class="form-control" style="width: 50%; font-size: 15px; text-align: center;" value="1" min="1" max="<?php echo $i['quantity'];?>">            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
    <div style="clear:both"></div>
    <h2>My Shopping Bag</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>&#8369 <?php echo $values["product_price"]; ?></td>
            <td>&#8369 <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&ID=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <form method="POSt" action="../user/checkout.php">
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">&#8369 <?php echo number_format($total, 2); ?></td>
        <td><input type="submit" name="" style="margin-top:5px;" class="btn btn-success" value="Checkout"></td>
        </tr>
    </form>
        <?php
	}
	?>
    </table>
    </div>
    </div>
 </body>
</html>