<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//line code 2 for php desktop

	$WshShell = new COM("WScript.Shell");
	//$obj = $WshShell->Run("cmd /c wscript.exe file.vbs",0, true); 
	$obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);

	$WshShell = new COM("WScript.Shell");
	//$obj = $WshShell->Run("cmd /c wscript.exe file.vbs",0, true);
	$obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);

	$WshShell = new COM("WScript.Shell");
	//$obj = $WshShell->Run("cmd /c wscript.exe file.vbs",0, true);
	$obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);

	$WshShell = new COM("WScript.Shell");
	//$obj = $WshShell->Run("cmd /c wscript.exe file.vbs",0, true);
	$obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);
	$WshShell = new COM("WScript.Shell");
	//$obj = $WshShell->Run("cmd /c wscript.exe file.vbs",0, true);
	$obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);
}

?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Beyond The Page</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/solid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>



	<link href="assets/css/modals.css" rel="stylesheet">
</head>

<body>


	<?php

	$vars = $_GET['vars'] ?? "";

	$obj = json_decode($_GET['vars'], true);

	?>

	<?php if (is_array($obj)) : ?>
		<?php

		$receipt = get_receipt_no('receipt_no');

		?>

		<center>
			<h1>Beyond The Page</h1>
			<h6><i>Receipt#: <?= ($receipt) - 1 ?></i></h6>
			<div><i><?= date("jS F, Y H:i a") ?></i></div>
		</center>

		<div class="container-fluid">

			<table class="table table-borderless">
				<tr>
					<td></td>
					<td></td>
					<td></td>
					</td>
					<td></td>
				</tr>
				<tr>
					<th>Qty</th>
					<th>Description</th>
					<th>Price</th>
					<th>Sub Total</th>
				</tr>


				<?php foreach ($obj['data'] as $row) : ?>
					<tr>
						<td><?= $row['qty'] ?></td>
						<td><?= $row['description'] ?></td>
						<td>₱<?= $row['amount'] ?></td>
						<td>₱<?= number_format($row['qty'] * $row['amount'], 2) ?></td>
					</tr>
				<?php endforeach; ?>
			</table>

			<table class="table table-borderless">
				<tr>
					<td></td>
					<td></td>
					<td></td>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3"><b> Total:</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b>₱<?= $obj['gtotal'] ?></b></td>
				</tr>
				<tr>
					<td colspan="3"> Cash:</td>
					<td></td>
					<td></td>
					<td></td>
					<td>₱<?= $obj['amount'] ?></td>
				</tr>
				<tr>
					<td colspan="3"> Change:</td>
					<td>
					<td></td>
					</td>
					<td></td>
					<td>₱<?= $obj['change'] ?></td>
				</tr>


			</table>
		</div>

		<br>
		<center>
			<p>
				<svg class="barcode-cell" data-barcode="<?= ($receipt) - 1 ?>"></svg>
			</p>
			<p><b>Thank you for buying!</b></p>
		</center>

	<?php endif; ?>

	<script>
		function generateReceiptBarcode(barcodeValue) {
			JsBarcode(".barcode-cell", barcodeValue, {
				format: "CODE128",
				width: 2, // Adjust the width as needed
				height: 50, // Adjust the height as needed
			});
		}

		// Wait for the document to finish loading
		document.addEventListener("DOMContentLoaded", function() {
			// Generate barcode for the receipt number
			generateReceiptBarcode(22222<?= ($receipt) - 1 ?>);

			// Print the receipt
			window.print();


			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange', function() {

				if (ajax.readyState == 4) {
					//console.log(ajax.responseText);
				}
			});

			ajax.open('POST', '', true);
			ajax.send();

		});
	</script>

</body>

</html>