<?php  include('bookserver.php');
		include('header.php');

if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM books WHERE ID=$ID");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$booktitle = $n['booktitle'];
			$quantity = $n['quantity'];
			$bookprice = $n['bookprice'];
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>
	<?php $results = mysqli_query($db, "SELECT * FROM books"); ?>
	
<table><br><br>
	<center><h1>Book Status</h1></center>
	<thead>
		<tr>
			<th>Book Title</th>
			<th>Stocks</th>
			<th>Price</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['booktitle']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['bookprice']; ?></td>
			<td>
				<a href="bookstatus.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="bookserver.php?del=<?php echo $row['ID']; ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="bookserver.php" >
		<input type="hidden" name="ID" value="<?php echo $ID; ?>">
		<div class="input-group">
			<label>Book Title</label>
			<input type="text" name="booktitle" value="<?php echo $booktitle; ?>">
		</div>
		<div class="input-group">
			<label>Stocks</label>
			<input type="text" name="quantity" value="<?php echo $quantity; ?>">
		</div>
		<div class="input-group">
			<label>Price</label>
			<input type="text" name="bookprice" value="<?php echo $bookprice; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" >Update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Add</button>
<?php endif ?>
		</div>
	</form>
</body>
</html>