
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">All Products</li>
		</ol>
	</nav>
	<!-- End Breadcrumb -->

	<!-- Message -->
	<div class="row">
		<div class="col-lg-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- End Message -->

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">All Products</h1>
	<!-- End Page Heading -->

	<!-- button -->
	<div class="row">
		<div class="col-lg-12">
			<button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#addProductModal">Add</button>
		</div>
	</div>
	<!-- end button -->

	<!-- content -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover text-nowrap text-center" id="dataTable" cellspacing="0" cellpadding="0">
							<thead class="text-center">
								<tr>
									<th width="5%">NO</th>
									<th>IMAGE</th>
									<th>CATEGORY</th>
									<th>PRODUCT NAME</th>
									<th>PRICE</th>
									<th>STATUS</th>
									<th>DATE</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach( $products as $product ) : ?>
								<tr title="<?= $product['product']; ?>">
									<td>
										<?= $no++; ?>
									</td>
									<td>
										<img src="<?= base_url('assets/img/products/') . $product['image']; ?>" class="img-thumbnail"  alt="<?= $product['product']; ?>" title="<?= $product['product']; ?>">
									</td>
									<td>
										<?= $product['category']; ?>
									</td>
									<td>
										<?= $product['product']; ?>
									</td>
									<td class="text-right">
										Rp.&emsp;<?= number_format($product['price']); ?>
									</td>
									<td>
										<?php if( $product['is_active'] == 1 ) : ?>
											<span class="badge badge-success">active</span>
										<?php else : ?>
											<span class="badge badge-danger">non active</span>
										<?php endif; ?>
									</td>
									<td>
										<?= date('d F Y', strtotime($product['created_at'])); ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end content -->

</div>
<!-- /.container-fluid -->
