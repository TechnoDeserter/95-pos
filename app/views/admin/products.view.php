<style>
	.barcode-cell {
		width: 170px;
		height: 100px;
	}
</style>

<div class="table-responsive pt-2" style="block-size:700px; background-color: white;"">
	
	<table class=" table table-hover">
	<thead>
		<tr>
			<th>Barcode</th>
			<th>Product</th>
			<th>Qty</th>
			<th>Price</th>
			<th>Image</th>
			<th>Date</th>
			<th>
				<a href="index.php?page=product-add">
					<button type="button" class="btn btn-outline-primary btn-sm">
						<i class="fa-solid fa-plus me-1"></i>Add Product
					</button>
				</a>
			</th>
		</tr>
	</thead>
	<tbody>


		<?php if (!empty($products)) : ?>
			<?php foreach ($products as $product) : ?>
				<tr>
					<td> <svg class="barcode-cell" data-barcode="<?= esc($product['barcode']) ?>"></svg></td>
					<td> <?= esc($product['description']) ?></td>

					<td><?= esc($product['qty']) ?></td>
					<td><?= esc($product['amount']) ?></td>
					<td>
						<img src="<?= crop($product['image']) ?>" style="width: 100%;max-width:100px;">
					</td>
					<td><?= esc($product['date']) ?></td>
					<td>
						<a href="index.php?page=product-edit&id=<?= $product['id'] ?>">
							<button class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button></a>
						<a href="index.php?page=product-delete&id=<?= $product['id'] ?>">
							<button class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete</button></a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
	</table>
</div>

<script>
	// Function to generate barcode and open modal
	function generateAndOpenModal(barcodeValue) {
		JsBarcode(".barcode-cell", barcodeValue);
		openModal();
	}

	// Function to open the modal
	function openModal() {
		document.getElementById("myModal").style.display = "block";
	}

	// Function to close the modal
	function closeModal() {
		document.getElementById("myModal").style.display = "none";
	}

	// Wait for the document to finish loading
	document.addEventListener("DOMContentLoaded", function() {
		// Loop through each barcode cell and generate barcode
		document.querySelectorAll('.barcode-cell').forEach(function(element) {
			let barcodeValue = element.getAttribute('data-barcode');
			JsBarcode(element, barcodeValue);
		});

	});
</script>