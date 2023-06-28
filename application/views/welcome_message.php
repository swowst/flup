<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a href="<?php echo 'payment'; ?>" class="nav-link">Payment type</a><br>
				<a href='<?php echo 'currency'; ?>' class="nav-link">Currency</a><br>
				<a href="<?php echo 'pay'; ?>" class="nav-link">Pay</a>
				<a href="<?php echo 'pays'; ?>" class="nav-link">All data</a><br>

			</div>
		</div>
	</div>
</nav>
<div id="container">

	<div id="body">
		<div class="m-4">
			<?php $this->load->view($content); ?>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
