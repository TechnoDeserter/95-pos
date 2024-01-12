<style>
	/* Add this to your CSS for improved modal styling */
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgba(0, 0, 0, 0.4);
		padding-top: 60px;
	}

	/* Add this to your CSS for a larger modal and barcode */
	.modal-content {
		background-color: #fefefe;
		margin: 10% auto;
		padding: 30px;
		border: 1px solid #888;
		width: 60%;
		max-width: 600px;
		position: relative;
		border-radius: 12px;
		box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
	}

	.close {
		color: #555;
		position: absolute;
		top: 15px;
		right: 15px;
		font-size: 24px;
		cursor: pointer;
	}

	.barcode-cell {
		width: 170px;
		/* Adjust the width as needed */
		height: 90px;
		/* Adjust the height as needed */
	}

	#barcode {
		width: 100%;
		height: 100%;
	}
</style>


<div class="table-responsive pt-2" style="block-size:700px; background-color: white;">

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


		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="closeModal()">&times;</span>
				<svg id="barcode"></svg>
			</div>
		</div>

		<tbody>

			<?php if (!empty($products)) : ?>
				<?php foreach ($products as $product) : ?>
					<tr>
						<td>
							<a href="javascript:void(0);" onclick="generateAndOpenModal('<?= esc($product['barcode']) ?>')">
								<svg class="barcode-cell" data-barcode="<?= esc($product['barcode']) ?>"></svg>
							</a>
						</td>
						<td>
							<?= esc($product['description']) ?>
						</td>

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

<script src="https://cdn.jsdelivr.net/jsbarcode/3.11.0/JsBarcode.all.min.js"></script>
<script>
	// Function to generate barcode and open modal
	function generateAndOpenModal(barcodeValue) {
		JsBarcode("#barcode", barcodeValue);
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
	window.onload = function() {
		// Loop through each barcode cell and generate barcode
		document.querySelectorAll('.barcode-cell').forEach(function(element) {
			let barcodeValue = element.getAttribute('data-barcode');
			JsBarcode(element, barcodeValue);
		});

		// Optionally, open the modal after generating the barcodes
		// openModal();
	};
</script>