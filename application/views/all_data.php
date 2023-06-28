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
		.col-2{
			width: 250px;
		}
		.container {
			width: 600px;
			padding: 20px;
			background: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	</style>

</head>
<body>

<div class="container">
	<div class="row ">
		<div class="col-2">
			<label>Payment Type</label>
			<select name="payment_id" id="paymentDropdown" class="form-select">
				<?php foreach ($payments as $payment):?>
					<option value="<?= $payment['id']?>"><?= $payment['payment']?></option>
				<?php endforeach;?></select>
		</div>
		<div class="col-2">
			<label>Currency</label>
			<select name="currency_id" id="currencyDropdown" class="form-select">
				<?php foreach ($currencies as $currency):?>
					<option value="<?= $currency['id']?>"><?= $currency['name']?></option>
				<?php endforeach;?></select>
		</div>
	</div>


	<table class="table text-center">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Amount</th>
			<th scope="col">Payment</th>
			<th scope="col">Currency</th>
			<th scope="col">Feedback</th>
			<th scope="col">Income</th>
			<th scope="col">Expense</th>
			<th scope="col">Total</th>
		</tr>
		</thead>
		<tbody id="pay">
		<?php
		$incomeTotal=0; $expenseTotal=0;
		foreach ($pays as $pay):
			$incomeTotal+=intval($pay['income']);
			$expenseTotal+=intval($pay['expense']);
			?>
			<tr>
				<td><?= $pay['id']?></td>
				<td ><?= $pay['amount']?></td>
				<td ><?= $pay['payment_id']?></td>
				<td ><?= $pay['currency_id']?></td>
				<td ><?= $pay['feedback']?></td>
				<td ><?= $pay['income']?></td>
				<td ><?= $pay['expense']?></td>
				<td ><?= ($pay['income']-$pay['expense'])?></td>

			</tr>
		<?php endforeach;?>

		</tbody>
	</table>
	<div>
		<p>Income Total:<span class="income-text"><?= $incomeTotal?></span></p>
		<p>Expense Total:<span class="expense-text"><?= $expenseTotal?></span></p>
		<p>Total:<span class="total-text"><?= $incomeTotal-$expenseTotal?></span></p>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
	document.getElementById("paymentDropdown").addEventListener("change", function() {
		var selectedTime = this.value;
		$.ajax({
			method: 'POST',
			url: 'payment-filter',
			data: {
				payment_id: selectedTime,
				pay:<?php echo json_encode($pays); ?>
			},
			success: function(pays) {
				var data = JSON.parse(pays);
				$('#pay').html('');
				var a=0,b=0;
				$.each(data, function(key, value) {
					a+=parseInt(value['income']);
					b+=parseInt(value['expense']);
					$("#pay").append("<tr>  "
						+ " <td>" + value['id'] +"</td> "
						+ " <td>" + value['amount'] +"</td> "
						+ " <td>" + value['payment_id'] +"</td> "
						+ " <td>" + value['currency_id'] +"</td> "
						+ " <td>" + value['feedback'] +"</td> "
						+ " <td>" + value['income'] +"</td> "
						+ " <td>" + value['expense'] +"</td> "
						+ " <td>" + (value['income']-value['expense']) +"</td> "
						+ "</tr>");
				});
				$(".income-text").html(a);
				$(".expense-text").html(b);
				$(".total-text").html(a-b);

			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	})


	document.getElementById("currencyDropdown").addEventListener("change", function() {
		var selectedTimes = this.value;
		$.ajax({
			method: 'POST',
			url: 'currency-filter',
			data: {
				currency_id: selectedTimes,
				pay:<?php echo json_encode($pays); ?>
			},
			success: function(pays) {
				console.log(11);
				var data = JSON.parse(pays);
				$('#pay').html('');
				var a=0,b=0;
				$.each(data, function(key, value) {
					a+=parseInt(value['income']);
					b+=parseInt(value['expense']);
					$("#pay").append("<tr>  "
						+ " <td>" + value['id'] +"</td> "
						+ " <td>" + value['amount'] +"</td> "
						+ " <td>" + value['payment_id'] +"</td> "
						+ " <td>" + value['currency_id'] +"</td> "
						+ " <td>" + value['feedback'] +"</td> "
						+ " <td>" + value['income'] +"</td> "
						+ " <td>" + value['expense'] +"</td> "
						+ " <td>" + (value['income']-value['expense']) +"</td> "
						+ "</tr>");
				});
				$(".income-text").html(a);
				$(".expense-text").html(b);
				$(".total-text").html(a-b);
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	})
</script>
</body>
</html>


