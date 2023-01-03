
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('profile'); ?>">My Profile</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
		</ol>
	</nav>
	<!-- End Breadcrumb -->

	<!-- Page Content - Profile -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h3 class="m-0 font-weight-bold text-dark"><i class="fas fa-user-edit mr-4"></i>Edit Profile</h3>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
							aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item text-white active" title="Edit Profile" href="<?= base_url('profile/edit_profile'); ?>"><i class="fas fa-user-edit fa-sm fa-fw mr-2"></i>Edit Profile</a>
							<hr class="dropdown-divider">
							<a class="dropdown-item text-primary" title="Change Password" href="<?= base_url('profile/change_password'); ?>"><i class="fas fa-key fa-sm fa-fw mr-2"></i>Change Password</a>
						</div>
					</div>
				</div>
				<div class="card-body shadow">
					<form action="<?= base_url('profile/edit_profile'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="fullname" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
								<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="phone" class="col-sm-2 col-form-label">Phone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>">
								<?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2">Picture</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-3">
										<img src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image">
											<label for="image" class="custom-file-label">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row justify-content-end">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary form-control">Save</button>
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
