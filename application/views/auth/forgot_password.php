
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
										<h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="exampleInputEmail"
												placeholder="Enter Email Address...">
										</div>
										<a href="login.html" class="btn btn-primary btn-user btn-block">
											Reset Password
										</a>
									</form>
                                    <hr>
									<div class="row">
										<div class="col-lg-6">
											<div class="text-center">
												<a class="small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
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
