// <!-- Script show password -->
$(document).ready(function () {
	$('.custom-control-input').click(function () {
		if ($(this).is(':checked')) {
			$('.form-password').attr('type', 'text');
		} else {
			$('.form-password').attr('type', 'password');
		}
	});
});
// <!-- End Script show password -->
