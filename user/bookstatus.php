<?php include('bookserver.php');
	  include('header.php');
	  include('connector.php');

		
		// fetch the record to be updated
		if (isset($_GET['edit'])){
			$ID = $_GET['edit'];
			$edit_state = true;

			$rec = mysqli_query($db, "SELECT * FROM books WHERE ID=$ID");
			$record = mysqli_fetch_array($rec);
			$booktitle = $record['booktitle'];
			$quantity = $record['q uantity'];
			$bookprice = $record['bookprice'];
			$ID = $record['ID'];
		}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel= "stylesheet" type="text/css" href="style.css">
</head>
<body><br><br>
	<center><h1>BOOK STATUS</h1></center>
		
		<?php if (isset($_SESSION['msg'])): ?>
			
			<div class = "msg">
				<?php 
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				?>
			</div>

		<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>Book Title</th>
				<th>Stocks</th>
				<th>Book Price</th>
				
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>

			<?php while ($row = mysqli_fetch_array($results)) { ?>

				<tr>
					<td><?php echo $row['booktitle']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['bookprice']; ?></td>

					<td>
						<a class= "edit_btn" href="bookstatus.php?edit=<?php echo $row['ID']; ?>">Edit</a>
					</td>
					<td>
						<a class="del_btn" href="bookserver.php?del=<?php echo $row['ID']; ?>">Delete</a>
					</td>

				</tr>

			<?php } ?>
			
		
		</tbody>
	</table>
	<form method="post" action="bookserver.php">
		<input type="hidden" name="ID" value="<?php echo $ID; ?>"> 
		<div class="input-group">
			<label>Book Title</label>
			<input type="text" name="booktitle" required value="<?php echo $booktitle; ?>"> 
		</div>
		<div class="input-group">
			<label>Stocks</label>
			<input type="text" name="quantity" required value="<?php echo $quantity; ?>"> 
		</div>
		<div class="input-group">
			<label>Book Price</label>
			<input type="text" name="bookprice" required value="<?php echo $bookprice; ?>">
		</div>
		<div class="input-group">
			
			<?php if ($edit_state == false): ?>
					<button type="submit" name="add" class="btn">Add</button>
			<?php else: ?>
					<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?> 
			
		</div>


	</form>
</body>
</html>