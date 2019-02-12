<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post" action="registration.php">
		<!-- display validation errors here -->
		<!--<?php include('errors.php'); ?>-->
		<div class="input-group">
			<label>Id Number</label>
			<input type="text" name="idnumber" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<label>Repeat Password</label>
			<input type="password" name="confirmpass" required>
		</div>
		<div class="input-group">
			<button type="submit" name="registration" class="btn btn-success default">Register</button>
		</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
	</form>
</body>
</html>

