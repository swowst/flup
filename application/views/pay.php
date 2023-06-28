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
			width: 500px;
			padding: 20px;
			background: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	</style>

</head>
<body>
<div class="m-3">
	<form action="<?php echo 'pay-send'; ?>" method="post">
		<div class="row container">
			<div class="col-4">
				<label for="name" class="form-label">Amount: </label><br>
				<input type="text" id="name" name="amount"  class="form-control" ><br>
			</div>
			<div class="col-4">
				<label for="drop" class="form-label">Payment Type:</label>
				<select name="payment_id" id="drop" class="form-select">
					<?php
					$this->load->database(); // Load the database library
					$this->load->model('Payment_model');
					$this->load->model('Currency_model');
					$payments = $this->Payment_model->get_all_payments();
					$currencies = $this->Currency_model->get_all_currencies();
					foreach ($payments as $payment): ?>
						<option value="<?= $payment['id']?>"><?= $payment['payment']; ?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="col-4">
				<label for="drop" class="form-label">Payment Type:</label>
				<select name="currency_id" id="drop"  class="form-select">
					<?php foreach ($currencies as $currency): ?>
						<option value="<?= $currency['id']?>"><?= $currency['name']; ?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="col-4">
				<label for="name" class="form-label">Feedback: </label><br>
				<input type="text" id="name" name="feedback"  class="form-control" ><br>
			</div>
			<div class="col-4">
				<label for="name" class="form-label">Income: </label><br>
				<input type="text" id="name" name="income"  class="form-control" ><br>
			</div>
			<div class="col-4">
				<label for="name" class="form-label">Expense: </label><br>
				<input type="text" id="name" name="expense"  class="form-control" ><br>
			</div>
			<input type="submit" value="Send" class="btn btn-primary">
	</form>

</body>
</html>
