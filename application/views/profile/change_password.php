
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('profile'); ?>">My Profile</a></li>
			<li class="breadcrumb-item active" aria-current="page">Change Password</li>
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

	<!-- Page Content - Profile -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h3 class="m-0 font-weight-bold text-dark"><i class="fas fa-key mr-4"></i>Change Password</h3>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
							aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item text-primary" title="Edit Profile" href="<?= base_url('profile/edit_profile'); ?>"><i class="fas fa-user-edit fa-sm fa-fw mr-2"></i>Edit Profile</a>
							<hr class="dropdown-divider">
							<a class="dropdown-item text-white active" title="Change Password" href="<?= base_url('profile/change_password'); ?>"><i class="fas fa-key fa-sm fa-fw mr-2"></i>Change Password</a>
						</div>
					</div>
				</div>
				<div class="card-body shadow">
					<form action="<?= base_url('profile/change_password'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="current_password" name="current_password">
								<?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="new_password1" class="col-sm-4 col-form-label">New Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="new_password1" name="new_password1">
								<?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="new_password2" class="col-sm-4 col-form-label">Confirm New Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="new_password2" name="new_password2">
								<?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row justify-content-end">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary form-control">Change Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Content - Profile -->

</div>
<!-- /.container-fluid -->
