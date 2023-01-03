
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('activity/carts'); ?>">Carts</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $product['product']; ?></li>
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
	
	<!-- content -->
	<div class="card-body shadow">
		<div class="row">
			<div class="col-md-4">
				<center>
					<img src="<?= base_url('assets/img/products/') . $product['image']; ?>" class="card-img"  alt="<?= $product['product']; ?>" title="<?= $product['product']; ?>">
				</center>
			</div>
			<div class="col-md-8">
				<hr>
				<h2 class="mb-4"><?= $product['product']; ?></h2>
				<table class="table">
					<tbody>
						<tr>
							<td>Harga</td>
							<td>:</td>
							<td>Rp.&ensp;<?= number_format($product['price']); ?></td>
						</tr>
						<form action="<?= base_url('activity/update/') . $order_detail['id_order_detail']; ?>" method="post">
							<tr>
								<td>Qty</td>
								<td>:</td>
								<td>
									<input type="number" name="qty" id="qty" class="form-control" value="<?= $order_detail['qty']; ?>" required>
								</td>
							</tr>
							<tr>
								<td>Note</td>
								<td>:</td>
								<td>
									<textarea name="note" id="note" rows="2" class="form-control" maxlength="100"><?= $order_detail['note']; ?></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="text-right">
									<button type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart mr-3"></i>SAVE</button>
								</td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- end content -->

</div>
<!-- /.container-fluid -->
