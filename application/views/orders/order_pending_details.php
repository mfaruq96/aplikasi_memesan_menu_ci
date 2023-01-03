
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('orders/order_pending'); ?>">Order Pending</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $order_detail_try['name']; ?></li>
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
	<h1 class="h3 mb-4 text-gray-800">Order Pending <?= $order_detail_try['name']; ?> <span class="badge badge-warning">belum bayar</span></h1>
	<!-- End Page Heading -->

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
									<th>PRODUCT</th>
									<th>QTY</th>
									<th>NOTE</th>
									<th>PRICE</th>
									<th>TOTAL PRICE</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach( $order_details as $order_detail ) : ?>
								<tr>
									<td>
										<?= $no++; ?>
									</td>
									<td>
										<?= $order_detail['product']; ?>
									</td>
									<td>
										<?= $order_detail['qty']; ?>
									</td>
									<td>
										<?= $order_detail['note']; ?>
									</td>
									<td class="text-right">
										Rp.&ensp;<?= number_format($order_detail['price']); ?>
									</td>
									<td class="text-right">
										Rp.&ensp;<?= number_format($order_detail['price'] * $order_detail['qty']); ?>
									</td>
								</tr>
								<?php endforeach; ?>
								<tr>
									<td colspan="5"></td>
									<td class="text-right">
										<b>
											Rp.&ensp;<?= number_format($order['total_price']); ?>
										</b>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end content -->

	<!-- checkout -->
	<form action="<?= base_url('activity/check_out/') . $order['id_order']; ?>" method="post" enctype="multipart/form-data">
		<div class="row mt-3">
			<div class="col-lg-4 mb-2">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
					<label for="image" class="custom-file-label">Evidence of payment</label>
				</div>
			</div>
			<div class="col-lg-4 mb-2 text-right">
				<input type="text" id="remark" name="remark" class="form-control" placeholder="Enter your note.." required>
			</div>
			<div class="col-lg-4 mb-2 text-right">
				<button class="btn btn-sm btn-success" width="100%">Check Out</button>
			</div>
		</div>
	</form>
	<!-- end content -->

</div>
<!-- /.container-fluid -->
