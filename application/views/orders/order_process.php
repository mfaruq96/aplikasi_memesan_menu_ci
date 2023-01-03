
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Order Process</li>
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
	<h1 class="h3 mb-4 text-gray-800">Order Process</h1>
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
										<?= date('d F Y', strtotime($order['updated_at'])); ?>
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
										<span class="badge badge-primary">sedang diproses</span>
									</td>
									<td>
										<a href="<?= base_url('orders/order_process_details/') . $order['id_order']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info"></i> detail</a>
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
