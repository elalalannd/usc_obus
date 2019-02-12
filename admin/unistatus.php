<?php  include('uniserver.php');
		include('header.php');

if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM uniforms WHERE ID=$ID");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$type = $n['type'];
			$size = $n['size'];
			$stocks = $n['stocks'];
			$price = $n['price'];
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
		<?php $results = mysqli_query($db, "SELECT * FROM uniforms"); ?>
		
			<table><br><br>
				<center><h1>Female Package</h1></center>
					<thead>
						<tr>
							<th>Uniform Type</th>
							<th>Size</th>
							<th>Stocks</th>
							<th>Price</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
				
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['type']; ?></td>
						<td><?php echo $row['size']; ?></td>
						<td><?php echo $row['stocks']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td>
							<a href="unistatus.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="uniserver.php?del=<?php echo $row['ID']; ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
						</td>
					</tr>
				<?php } ?>
			</table>


			<table><br><br>
				<center><h1>Male Package</h1></center>
					<thead>
						<tr>
							<th>Uniform Type</th>
							<th>Size</th>
							<th>Stocks</th>
							<th>Price</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
				
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['type']; ?></td>
						<td><?php echo $row['size']; ?></td>
						<td><?php echo $row['stocks']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td>
							<a href="unistatus.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="uniserver.php?del=<?php echo $row['ID']; ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
						</td>
					</tr>
				<?php } ?>
			</table>




		<form method="post" action="uniserver.php" >
			<input type="hidden" name="ID" value="<?php echo $ID; ?>">
				<div class="input-group">
					<label>Uniform Type</label>
					<input type="text" name="type" value="<?php echo $type; ?>">
				</div>
				<div class="input-group">
					<label>Size</label>
					<input type="text" name="size" value="<?php echo $size; ?>">
				</div>
				<div class="input-group">
					<label>Stocks</label>
					<input type="text" name="stocks" value="<?php echo $stocks; ?>">
				</div>
				<div class="input-group">
					<label>Price</label>
					<input type="text" name="price" value="<?php echo $price; ?>">
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