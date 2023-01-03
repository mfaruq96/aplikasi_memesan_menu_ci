
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('activity/history'); ?>">History</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $order['invoice']; ?></li>
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
	<h1 class="h3 mb-4 text-gray-800">Order Details <?= $order['invoice']; ?></h1>
	<!-- End Page Heading -->

	<!-- customer details -->
	<div class="row mb-2">
		<div class="col-lg-7">
			<table class="table text-nowrap" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>Invoice</td>
						<td>:</td>
						<td>
							<?= $order['invoice']; ?>
						</td>
					</tr>
					<tr>
						<td>Date</td>
						<td>:</td>
						<td>
							<?= date('d F Y, h:i', strtotime($order['updated_at'])); ?>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							<?php if( $order['status'] == 0 ) : ?>
								<span class="badge badge-warning">belum bayar</span>
							<?php endif; ?>
							<?php if( $order['status'] == 1 ) : ?>
								<span class="badge badge-info">sudah bayar</span>
							<?php endif; ?>
							<?php if( $order['status'] == 2 ) : ?>
								<span class="badge badge-primary">sedang diproses</span>
							<?php endif; ?>
							<?php if( $order['status'] == 3 ) : ?>
								<span class="badge badge-success">selesai</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Remark</td>
						<td>:</td>
						<td>
							<?= $order['remark']; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>
	</div>
	<!-- end customer details -->

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
	<div class="row mt-3">
		<div class="col-lg-12 mb-2 text-right">
			<button class="btn btn-sm btn-info mb-2" width="100%" data-toggle="modal" data-target="#viewPayment">View proof of payment</button>
		</div>
	</div>
	<!-- end checkout -->

	<!-- Modal Proof Payment -->
	<div class="modal fade" id="viewPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add">Payment of Invoice : <?= $order['invoice']; ?></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<img src="<?= base_url('assets/img/orders/') . $order['image']; ?>" alt="<?= $order['invoice']; ?>" title="<?= $order['invoice']; ?>" class="card-img">
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Proof Payment -->

</div>
<!-- /.container-fluid -->
