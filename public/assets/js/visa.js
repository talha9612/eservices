
$(document).ready(function() {

    // ---------- APPLICATION BASE URL -------- //
    var baseUrl = $('#base-url').val();

	//---------- ON CLICK SAVE VISA ----------//
	$(document).on('click', '#btn-save-visa', function(e) {
		e.preventDefault();
		removeErrorMessages();
		
		var self = $(this);
			self_html = self.html();
			visaNo = $('#visa-no').val();
			visaTypeArabic = $('#visa-type-arabic').val();
			visaTypeEnglish = $('#visa-type-english').val();
			visaPurposeArabic = $('#visa-purpose-arabic').val();
			visaPurposeEnglish = $('#visa-purpose-english').val();
			dateOfIssue = $('#date-of-issue').val();
			dateOfExpiry = $('#date-of-expiry').val();
			placeOfIssueArabic = $('#place-of-issue-arabic').val();
			fullnameArabic = $('#fullname-arabic').val();
			fullnameEnglish = $('#fullname-english').val();
			moiRefrence = $('#moi-refrence').val();
			nationality = $('#nationality').val();
			holderDateOfIssue = $('#holder-date-of-issue').val();
			gender = $('#gender').val(); // Enum select field
			occupationArabic = $('#occupation-arabic').val();
			occupationEnglish = $('#occupation-english').val();
			dateOfBirth = $('#date-of-birth').val();
			passportNo = $('#passport-no').val();
			placeOfIssue = $('#place-of-issue').val();
			passportType = $('#passport-type').val();
			holderExpiryDate = $('#holder-expiry-date').val();
			companyFullnameArabic = $('#company-fullname-arabic').val();
			moiRefrenceFamily = $('#moi-refrence-family').val();
			mobileNo = $('#mobile-no').val();
            visaMessage = $('#message').val();
			qrLink = $('#qr-link').val();
			message = '';
			flag = true;

		if (visaNo == '') {
            $('#visa-no').addClass('is-invalid').after('<span class="invalid-feedback">Visa No is required!</span>');
            flag = false;
        }
        if (visaTypeArabic == '') {
            $('#visa-type-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Visa Type (Arabic) is required!</span>');
            flag = false;
        }
        if (visaTypeEnglish == '') {
            $('#visa-type-english').addClass('is-invalid').after('<span class="invalid-feedback">Visa Type (English) is required!</span>');
            flag = false;
        }
        if (visaPurposeArabic == '') {
            $('#visa-purpose-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Visa Purpose (Arabic) is required!</span>');
            flag = false;
        }
        if (visaPurposeEnglish == '') {
            $('#visa-purpose-english').addClass('is-invalid').after('<span class="invalid-feedback">Visa Purpose (English) is required!</span>');
            flag = false;
        }
        if (dateOfIssue == '') {
            $('#date-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Date of Issue is required!</span>');
            flag = false;
        }
        if (dateOfExpiry == '') {
            $('#date-of-expiry').addClass('is-invalid').after('<span class="invalid-feedback">Date of Expiry is required!</span>');
            flag = false;
        }
        if (placeOfIssueArabic == '') {
            $('#place-of-issue-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Place of Issue (Arabic) is required!</span>');
            flag = false;
        }
        if (fullnameArabic == '') {
            $('#fullname-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Fullname (Arabic) is required!</span>');
            flag = false;
        }
        if (fullnameEnglish == '') {
            $('#fullname-english').addClass('is-invalid').after('<span class="invalid-feedback">Fullname (English) is required!</span>');
            flag = false;
        }
        if (moiRefrence == '') {
            $('#moi-refrence').addClass('is-invalid').after('<span class="invalid-feedback">MOI Reference is required!</span>');
            flag = false;
        }
        if (nationality == '') {
        	$("#nationality").siblings('span.select2-container').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
            flag = false;
        }
        if (holderDateOfIssue == '') {
            $('#holder-date-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Holder Date of Issue is required!</span>');
            flag = false;
        }
        if (gender == '') {
            $("#gender").siblings('span.select2-container').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
            flag = false;
        }
        if (occupationArabic == '') {
            $('#occupation-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Occupation (Arabic) is required!</span>');
            flag = false;
        }
        if (occupationEnglish == '') {
            $('#occupation-english').addClass('is-invalid').after('<span class="invalid-feedback">Occupation (English) is required!</span>');
            flag = false;
        }
        if (dateOfBirth == '') {
            $('#date-of-birth').addClass('is-invalid').after('<span class="invalid-feedback">Date of Birth is required!</span>');
            flag = false;
        }
        if (passportNo == '') {
            $('#passport-no').addClass('is-invalid').after('<span class="invalid-feedback">Passport No is required!</span>');
            flag = false;
        }
        if (placeOfIssue == '') {
            $('#place-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Place of Issue is required!</span>');
            flag = false;
        }
        if (passportType == '') {
            $('#passport-type').addClass('is-invalid').after('<span class="invalid-feedback">Passport Type is required!</span>');
            flag = false;
        }
        if (holderExpiryDate == '') {
            $('#holder-expiry-date').addClass('is-invalid').after('<span class="invalid-feedback">Holder Expiry Date is required!</span>');
            flag = false;
        }
        if (companyFullnameArabic == '') {
            $('#company-fullname-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Company Fullname (Arabic) is required!</span>');
            flag = false;
        }
        if (moiRefrenceFamily == '') {
            $('#moi-refrence-family').addClass('is-invalid').after('<span class="invalid-feedback">MOI Reference Family is required!</span>');
            flag = false;
        }
        if (mobileNo == '') {
            $('#mobile-no').addClass('is-invalid').after('<span class="invalid-feedback">Mobile No is required!</span>');
            flag = false;
        }
        if (qrLink == '') {
            $('#qr-link').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
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

	//---------- ON CLICK UPDATE VISA ----------//
	$(document).on('click', '#btn-update-visa', function(e) {
		e.preventDefault();
		removeErrorMessages();
		
		var self = $(this);
			self_html = self.html();
			visaNo = $('#visa-no').val();
			visaTypeArabic = $('#visa-type-arabic').val();
			visaTypeEnglish = $('#visa-type-english').val();
			visaPurposeArabic = $('#visa-purpose-arabic').val();
			visaPurposeEnglish = $('#visa-purpose-english').val();
			dateOfIssue = $('#date-of-issue').val();
			dateOfExpiry = $('#date-of-expiry').val();
			placeOfIssueArabic = $('#place-of-issue-arabic').val();
			fullnameArabic = $('#fullname-arabic').val();
			fullnameEnglish = $('#fullname-english').val();
			moiRefrence = $('#moi-refrence').val();
			nationality = $('#nationality').val();
			holderDateOfIssue = $('#holder-date-of-issue').val();
			gender = $('#gender').val(); // Enum select field
			occupationArabic = $('#occupation-arabic').val();
			occupationEnglish = $('#occupation-english').val();
			dateOfBirth = $('#date-of-birth').val();
			passportNo = $('#passport-no').val();
			placeOfIssue = $('#place-of-issue').val();
			passportType = $('#passport-type').val();
			holderExpiryDate = $('#holder-expiry-date').val();
			companyFullnameArabic = $('#company-fullname-arabic').val();
			moiRefrenceFamily = $('#moi-refrence-family').val();
			mobileNo = $('#mobile-no').val();
			visaMessage = $('#message').val();
			message = '';
			flag = true;

		if (visaNo == '') {
            $('#visa-no').addClass('is-invalid').after('<span class="invalid-feedback">Visa No is required!</span>');
            flag = false;
        }
        if (visaTypeArabic == '') {
            $('#visa-type-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Visa Type (Arabic) is required!</span>');
            flag = false;
        }
        if (visaTypeEnglish == '') {
            $('#visa-type-english').addClass('is-invalid').after('<span class="invalid-feedback">Visa Type (English) is required!</span>');
            flag = false;
        }
        if (visaPurposeArabic == '') {
            $('#visa-purpose-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Visa Purpose (Arabic) is required!</span>');
            flag = false;
        }
        if (visaPurposeEnglish == '') {
            $('#visa-purpose-english').addClass('is-invalid').after('<span class="invalid-feedback">Visa Purpose (English) is required!</span>');
            flag = false;
        }
        if (dateOfIssue == '') {
            $('#date-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Date of Issue is required!</span>');
            flag = false;
        }
        if (dateOfExpiry == '') {
            $('#date-of-expiry').addClass('is-invalid').after('<span class="invalid-feedback">Date of Expiry is required!</span>');
            flag = false;
        }
        if (placeOfIssueArabic == '') {
            $('#place-of-issue-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Place of Issue (Arabic) is required!</span>');
            flag = false;
        }
        if (fullnameArabic == '') {
            $('#fullname-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Fullname (Arabic) is required!</span>');
            flag = false;
        }
        if (fullnameEnglish == '') {
            $('#fullname-english').addClass('is-invalid').after('<span class="invalid-feedback">Fullname (English) is required!</span>');
            flag = false;
        }
        if (moiRefrence == '') {
            $('#moi-refrence').addClass('is-invalid').after('<span class="invalid-feedback">MOI Reference is required!</span>');
            flag = false;
        }
        if (nationality == '') {
        	$("#nationality").siblings('span.select2-container').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
            flag = false;
        }
        if (holderDateOfIssue == '') {
            $('#holder-date-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Holder Date of Issue is required!</span>');
            flag = false;
        }
        if (gender == '') {
            $("#gender").siblings('span.select2-container').addClass('is-invalid').after('<span class="invalid-feedback">The field is required !</span>');
            flag = false;
        }
        if (occupationArabic == '') {
            $('#occupation-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Occupation (Arabic) is required!</span>');
            flag = false;
        }
        if (occupationEnglish == '') {
            $('#occupation-english').addClass('is-invalid').after('<span class="invalid-feedback">Occupation (English) is required!</span>');
            flag = false;
        }
        if (dateOfBirth == '') {
            $('#date-of-birth').addClass('is-invalid').after('<span class="invalid-feedback">Date of Birth is required!</span>');
            flag = false;
        }
        if (passportNo == '') {
            $('#passport-no').addClass('is-invalid').after('<span class="invalid-feedback">Passport No is required!</span>');
            flag = false;
        }
        if (placeOfIssue == '') {
            $('#place-of-issue').addClass('is-invalid').after('<span class="invalid-feedback">Place of Issue is required!</span>');
            flag = false;
        }
        if (passportType == '') {
            $('#passport-type').addClass('is-invalid').after('<span class="invalid-feedback">Passport Type is required!</span>');
            flag = false;
        }
        if (holderExpiryDate == '') {
            $('#holder-expiry-date').addClass('is-invalid').after('<span class="invalid-feedback">Holder Expiry Date is required!</span>');
            flag = false;
        }
        if (companyFullnameArabic == '') {
            $('#company-fullname-arabic').addClass('is-invalid').after('<span class="invalid-feedback">Company Fullname (Arabic) is required!</span>');
            flag = false;
        }
        if (moiRefrenceFamily == '') {
            $('#moi-refrence-family').addClass('is-invalid').after('<span class="invalid-feedback">MOI Reference Family is required!</span>');
            flag = false;
        }
        if (mobileNo == '') {
            $('#mobile-no').addClass('is-invalid').after('<span class="invalid-feedback">Mobile No is required!</span>');
            flag = false;
        }

		if (flag) {
			// Button Loading
			self.addClass('disabled').html('<div class="spinner-border"></div>');
			
			var form = $('#update-visa-form');
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
						toastr.success(response.message);
						scrollToTop();
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

	//---------- ON CLICK DESTROY VISA ----------//
	$(document).on('click', '.btn-destroy-visa', function(e) {
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
		 					var table = $('#visa-table').DataTable();
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

    // -------------- ON CHANGE QR LINK ------------ //
    $(document).on('keyup', '#qr-link', function(e) {
        e.preventDefault();
        var val = $(this).val();

        if (val == '') {
            $('.qr-link').html(`<a href="#"></a>`);
        } else {
            var encode = encodeURIComponent(val);
            $('.qr-link').html(`<a href="#">${baseUrl}/verify/qrcode/${encode}</a>`);
        }
    });
});