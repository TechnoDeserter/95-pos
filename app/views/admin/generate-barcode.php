<?php
require '/xampp/htdocs/pos-main/pos/app/libraries/barcode.php';

// Get the barcode from the URL parameter
$barcode = $_GET['barcode'] ?? '';

// Check if a valid barcode is provided
if (!empty($barcode)) {
    // Generate the barcode
    $barcodeGenerator = new Barcode();
    $barcodeGenerator->generate($barcode);

    // Display the generated barcode image
    echo '<img src="barcode.jpg" style="border: solid thin #888; width:100%">';
} else {
    echo 'Invalid barcode.';
}
