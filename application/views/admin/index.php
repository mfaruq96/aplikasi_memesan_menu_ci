
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
	<!-- End Page Heading -->

	<!-- count -->
	<div class="row">

		<!-- Products -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Products</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($count_product); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Products -->
		
		<!-- Manual Order -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Order Pending</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($count_manual_order); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Manual Order -->

		<!-- Order Verification -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Order Verification</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($count_order_verification); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Order Verification -->

		<!-- Order Process -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Order Process</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($count_order_process); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Order Process -->

	</div>
	<!-- end count -->

	<hr>

	<!-- tabel order -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover text-nowrap text-center" id="dataTable" cellspacing="0" cellpadding="0">
							<thead class="text-center">
								<tr>
									<th width="5%">NO</th>
									<th>NAME</th>
									<th>INVOICE</th>
									<th>STATUS</th>
									<th>REMARK</th>
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
										<?= $order['name']; ?>
									</td>
									<td>
										<?= $order['invoice']; ?>
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
										<?= $order['remark']; ?>
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
	<!-- end tabel order -->

</div>
<!-- /.container-fluid -->
