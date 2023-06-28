<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		body {
			background: linear-gradient(to bottom right, #833AB4, #FD1D1D, #F56040);
			margin: 0;
			height: 100vh;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.container {
			width: 400px;
			padding: 20px;
			background: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>

<div class="m-3">
	<div class="row">
		<div class="col-3 container">
			<form action="<?php echo 'payment-send'; ?>" method="post">
				<label for="name" class="form-label">Payment Type:</label><br>
				<input type="text" id="name" name="payment" class="form-control"><br>
				<input type="submit" value="Send" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>

</body>
</html>
