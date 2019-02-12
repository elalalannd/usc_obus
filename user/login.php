<?php 

include ('connector.php');
?>
<?php if (isset($_SESSION['msg'])): ?>
			
			<div class = "msg">
				<?php 
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				?>
			</div>

		<?php endif ?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
	<body>
		<div class="header">
			<h2>Login</h2>
		</div>
		<form method="post" action="../user/index.php">
			<div class="input-group">
				<label>Id Number</label>
				<input type="text" name="idnumber">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" name="login" class="btn">Login</button>
			</div>
			
		</form>
	</body>
</html>