
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="name" name="name"
												placeholder="Your Name" value="<?= set_value('name') ?>">
												<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="email" name="email"
												placeholder="Email Address" value="<?= set_value('email') ?>">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="number" class="form-control form-control-user" id="phone" name="phone"
												placeholder="Phone, ex : 08123456789" value="<?= set_value('phone') ?>">
												<?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="password" class="form-control form-control-user form-password"
													id="password_one" name="password_one" placeholder="Password">
													<?= form_error('password_one', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user form-password"
													id="password_two" name="password_two" placeholder="Repeat Password">
											</div>
										</div>
										<div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
													View password
												</label>
                                            </div>
                                        </div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Register Account
										</button>
									</form>
                                    <hr>
									<div class="row">
										<div class="col-lg-6">
											<div class="text-center">
												<a class="small" href="<?= base_url('auth/forgot_password'); ?>">Forgot Password?</a>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="text-center">
												<a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
