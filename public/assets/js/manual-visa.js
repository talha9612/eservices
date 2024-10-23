
$(document).ready(function() {
	
	// ------------ ON CLICK UPLOAD VISA ------------ //
	$(document).on('click', '#btn-upload-visa', function(e) {
		e.preventDefault();
		removeErrorMessages();

		var self = $(this);
			self_html = self.html();
			file = $('#file').val();
			passportNo = $('#passport-no').val();
			dateOfBirth = $('#date-of-birth').val();
			nationality = $('#nationality').val();
			message = '';
			flag = true;

		if (file == '') {
            $('#file').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
        }

        if (passportNo == '') {
            $('#passport-no').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
        }

        if (dateOfBirth == '') {
            $('#date-of-birth').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
        }

        if (nationality == '') {
        	$("#nationality").siblings('span.select2-container').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
            flag = false;
        }

        if (flag) {
        	// Button Loading
			self.addClass('disabled').html('<div class="spinner-border"></div>');
			
			var form = $('#create-visa-form');
				url = form.attr('action');
				formData = new FormData(form[0]);
			
			$.ajax({
				url: url,
				type: 'POST',
				data: formData,
				enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
				success: function (response) {
					if (response.status == true) {
						form[0].reset();
				      	$('.select2').val('').change();
				      	scrollToTop();
						toastr.success(response.message);
					} else {
						if (response?.errors) {
							showErrorMessages(response.errors);
						} else {
							message = errorMessage(response.message);
						}
					}
				},
				error: function() {
					message = errorMessage();
				},
				complete: function() {
					if (message != '') showAlertInTop(message);
					self.removeClass('disabled').html(self_html);
				}
			});
        }
	});

	//---------- ON CLICK STATUS BUTTON ----------//
	$(document).on('click', '.btn-update-status', function(e) {
		e.preventDefault();
		removeErrorMessages();

		var self = $(this);
			self_html = self.html();
			url = self.attr('data-url');
			message = '';

		// BUTTON LOADING
		self.addClass('disabled').html('<div class="spinner-border-sm"></div>');

		$.ajax({
			url: url,
			type: 'PUT',
			success: function(response) {
				if (response.status == true) {
					if (response.is_active == 1) {
						self.removeClass('btn-danger').addClass('btn-success').html('Active');
					} else {
						self.removeClass('btn-success').addClass('btn-danger').html('Dective');
					}
				} else {
					message = errorMessage(response.message);
				}
			},
			error: function() {
				message = errorMessage();
			},
			complete: function() {
				if (message != '') {
					showAlertInTop(message);
					self.html(self_html);	
				}

				self.removeClass('disabled');
			}
		});
	});

	//---------- ON CLICK DESTROY VISA ----------//
	$(document).on('click', '.btn-destroy-manual-visa', function(e) {
		e.preventDefault();
		removeErrorMessages();

		var self = $(this);
			self_html = self.html();
			url = self.attr('data-url');
			message = '';

		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		 	if (result.isConfirmed) {
		 		// BUTTON LOADING
				self.addClass('disabled').html('<div class="spinner-border-sm"></div>');

		 		$.ajax({
		 			url: url,
		 			type: 'DELETE',
		 			success: function(response) {
		 				if (response.status == true) {
		 					var table = $('#manual-visa-table').DataTable();
		 					table.row(self.parents('tr')).remove().draw();
		 					toastr.success(response.message);
		 				} else {
		 					message = errorMessage(response.message);
		 				}
		 			},
		 			error: function() {
		 				message = errorMessage();
		 			},
		 			complete: function() {
		 				if (message != '') {
		 					showAlertInTop(message);
		 					self.removeClass('disabled').html(self_html);
		 				}
		 			}
		 		});
		  	}
		});
	});
});