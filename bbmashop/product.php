<?php include 'includes/session.php'; ?>

<?php
$conn = $pdo->open();

$slug = $_GET['product'];

try {
	$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	$stmt->execute(['slug' => $slug]);
	$product = $stmt->fetch();
} catch (PDOException $e) {
	echo "Connection error: " . $e->getMessage();
}

//Amount of times product was viewed
$now = date('Y-m-d');
if ($product['date_view'] == $now) {
	$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
	$stmt->execute(['id' => $product['prodid']]);
} else {
	$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
	$stmt->execute(['id' => $product['prodid'], 'now' => $now]);
}
?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-black layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-9">
							<div class="callout" id="callout" style="display:none">
								<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
								<span class="message"></span>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<img src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>" width="100%">
									<br><br>
									<form class="form-inline" id="productForm">
										<div class="form-group">
											<label for="size"><span class="headings1">Size</span></label><br>
											<select class="form-control input-lg" id="size" name="size" value="" required>
												<option disabled selected value> - </option>
												<option value="s">S</option>
												<option value="m">M</option>
												<option value="l">L</option>
												<option value="xl">XL</option>
												<option value="xxl">XXL</option>
												<option value="xxxl">XXXL</option>
											</select><br>
											<label for="quantity"><span class="headings1">Quantity</span></label><br>
											<div class="input-group col-sm-5">
												<span class="input-group-btn">
													<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
												</span>
												<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
												<span class="input-group-btn">
													<button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
													</button>
												</span>
												<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
											</div>
											<button type="submit" class="btn btn-primary btn-lg btn-flat btn-custom2">Add to Cart</button>
										</div>
									</form>
								</div>
								<div class="col-sm-6">
								<span class="headings1"><h1 class="page-header"><?php echo $product['prodname']; ?></h1>
									<h3><b>&#82; <?php echo number_format($product['price'], 2); ?></b></h3>
									<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><span class="headings1"><?php echo $product['catname']; ?></span></a></p>
									<p><b>Description:</b></p>
									<p><?php echo $product['description']; ?></p></span>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
					</div>
				</section>

			</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		$(function() {
			$('#add').click(function(e) {
				e.preventDefault();
				var quantity = $('#quantity').val();
				quantity++;
				$('#quantity').val(quantity);
			});
			$('#minus').click(function(e) {
				e.preventDefault();
				var quantity = $('#quantity').val();
				if (quantity > 1) {
					quantity--;
				}
				$('#quantity').val(quantity);
			});

		});
	</script>
</body>

</html>