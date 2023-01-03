
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product Categories</li>
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
	<h1 class="h3 mb-4 text-gray-800">Product Categories</h1>
	<!-- End Page Heading -->

	<!-- button -->
	<div class="row">
		<div class="col-lg-12">
			<button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#addCategoryModal">Add</button>
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
									<th>CATEGORY</th>
									<th>DATE</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach( $categories as $category ) : ?>
								<tr>
									<td class="text-center">
										<?= $no++; ?>
									</td>
									<td>
										<?= $category['category']; ?>
									</td>
									<td>
										<?= date('d F Y', strtotime($category['created_at'])); ?>
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
