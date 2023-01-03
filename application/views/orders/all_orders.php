
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">All Orders</li>
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
	<h1 class="h3 mb-4 text-gray-800">All Orders</h1>
	<!-- End Page Heading -->

	<!-- button -->
	<div class="row">
		<div class="col-lg-12">
			<a href="<?= base_url('orders/export_orders'); ?>" target="_blank" class="btn btn-sm btn-success mb-2" title="Download Data / Export Data">
				<i class="fas fa-download"></i> Download
			</a>
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
									<th>DATE</th>
									<th>INVOICE</th>
									<th>NAME</th>
									<th>TOTAL PRICE</th>
									<th>STATUS</th>
									<th>OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach( $orders as $order ) : ?>
								<tr>
									<td>
										<?= $no++; ?>
									</td>
									<td>
										<?= date('d F Y', strtotime($order['created_at'])); ?>
									</td>
									<td>
										<?= $order['invoice']; ?>
									</td>
									<td>
										<?= $order['name']; ?>
									</td>
									<td class="text-right">
										Rp.&ensp;<?= number_format($order['total_price']); ?>
									</td>
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
									<td>
										<?php if( $order['status'] == 0 ) : ?>
											<a href="<?= base_url('orders/order_pending_details/') . $order['id_order']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> detail</a>
										<?php endif; ?>
										<?php if( $order['status'] == 1 ) : ?>
											<a href="<?= base_url('orders/order_verification_details/') . $order['id_order']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> detail</a>
										<?php endif; ?>
										<?php if( $order['status'] == 2 ) : ?>
											<a href="<?= base_url('orders/order_process_details/') . $order['id_order']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> detail</a>
										<?php endif; ?>
										<?php if( $order['status'] == 3 ) : ?>
											<a href="<?= base_url('orders/order_details/') . $order['id_order']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> detail</a>
										<?php endif; ?>
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
