
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
					<h3 class="m-0 font-weight-bold text-dark"><i class="fas fa-user mr-4"></i>My Profile</h3>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
							aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item text-primary" title="Edit Profile" href="<?= base_url('profile/edit_profile'); ?>"><i class="fas fa-user-edit fa-sm fa-fw mr-2"></i>Edit Profile</a>
							<hr class="dropdown-divider">
							<a class="dropdown-item text-primary" title="Change Password" href="<?= base_url('profile/change_password'); ?>"><i class="fas fa-key fa-sm fa-fw mr-2"></i>Change Password</a>
						</div>
					</div>
				</div>
				<div class="card-body shadow">
					<div class="form-group row">
						<div class="col-sm-4">
							<img class="card-img shadow" src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" title="<?= $user['name']; ?>" alt="<?= $user['name']; ?>">
						</div>
						<div class="col-sm-8">
							<div class="card-body shadow">
								<h5 class="m-0 font-weight-bold text-dark"><?= $user['name']; ?></h5>
								<hr>
								<p class="card-text">
									<i class="fas fa-envelope fa-sm -fa-fw mr-3"></i><?= $user['email']; ?><br>
									<i class="fas fa-phone fa-sm -fa-fw mr-3"></i><?= $user['phone']; ?><br>
								</p>
								<hr>
								<p class="card-text" style="text-align: right;"><small class="text-muted">Member since <?= date('d F Y', strtotime($user['created_at'])); ?></small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Content - Profile -->

</div>
<!-- /.container-fluid -->
