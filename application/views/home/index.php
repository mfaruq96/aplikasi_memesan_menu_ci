
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Message -->
	<div class="row">
		<div class="col-lg-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- End Message -->

	<!-- Page Heading -->
	<center>
		<h1 class="h3 text-success text-center">Soto Mie Bogor Boga Rasa</h1>
		<img src="<?= base_url('assets/img/others/banner.png'); ?>" class="rounded" width="50%" alt="Soto Mie Bogor Boga Rasa" title="Soto Mie Bogor Boga Rasa">
	</center>
	<!-- End Page Heading -->

	<hr class="mb-4 mt-4">

	<h1 class="h4 text-success mb-4">Makanan</h1>

	<!-- content makanan -->
	<div class="row">
		<?php foreach( $products_makanan as $product_makanan ): ?>
		<div class="col-lg-4">
			<div class="card shadow-sm mb-3">
				<div class="card-body" title="<?= $product_makanan['product']; ?>">
					<img class="card-img rounded" src="<?= base_url('assets/img/products/') . $product_makanan['image']; ?>" height="200" alt="<?= $product_makanan['product']; ?>" title="<?= $product_makanan['product']; ?>">
					<hr>
					<h6 class="card-title"><strong><?= $product_makanan['product']; ?></strong></h6>
					<p class="card-text small mt-3">
						<?php if( $product_makanan['is_active'] == 1 ) : ?>
							<span class="badge badge-success">Available</span><br>
						<?php else : ?>
							<span class="badge badge-danger">Not available</span><br>
						<?php endif; ?>
						Rp.&ensp;<?= number_format($product_makanan['price']); ?><br>
						<hr>
					</p>
					<?php if( $product_makanan['is_active'] == 1 ) : ?>
						<a href="<?= base_url('home/product/') . $product_makanan['id_product']; ?>" title="Click BUY for more detail" class="btn btn-primary form-control btn-sm">
							<i class="fas fa-shopping-cart"></i>&ensp;BUY
						</a>
					<?php else : ?>
						<a href="#" data-toggle="modal" data-target="#notAvailableModal" title="Click BUY for more detail" class="btn btn-primary form-control btn-sm">
							<i class="fas fa-shopping-cart"></i>&ensp;BUY
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<!-- end content makanan -->

	<hr class="mb-4 mt-4">

	<h1 class="h4 text-success mb-4">Minuman</h1>

	<!-- content minuman -->
	<div class="row">
		<?php foreach( $products_minuman as $product_minuman ): ?>
		<div class="col-lg-4">
			<div class="card shadow-sm mb-3">
				<div class="card-body" title="<?= $product_minuman['product']; ?>">
					<img class="card-img rounded" src="<?= base_url('assets/img/products/') . $product_minuman['image']; ?>" height="200" alt="<?= $product_minuman['product']; ?>" title="<?= $product_minuman['product']; ?>">
					<hr>
					<h6 class="card-title"><strong><?= $product_minuman['product']; ?></strong></h6>
					<p class="card-text small mt-3">
						<?php if( $product_minuman['is_active'] == 1 ) : ?>
							<span class="badge badge-success">Available</span><br>
						<?php else : ?>
							<span class="badge badge-danger">Not available</span><br>
						<?php endif; ?>
						Rp.&ensp;<?= number_format($product_minuman['price']); ?><br>
						<hr>
					</p>
					<?php if( $product_minuman['is_active'] == 1 ) : ?>
						<a href="<?= base_url('home/product/') . $product_minuman['id_product']; ?>" title="Click BUY for more detail" class="btn btn-primary form-control btn-sm">
							<i class="fas fa-shopping-cart"></i>&ensp;BUY
						</a>
					<?php else : ?>
						<a href="#" data-toggle="modal" data-target="#notAvailableModal" title="Click BUY for more detail" class="btn btn-primary form-control btn-sm">
							<i class="fas fa-shopping-cart"></i>&ensp;BUY
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<!-- end content minuman -->

</div>
<!-- /.container-fluid -->
