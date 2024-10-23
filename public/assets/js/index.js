
$(document).ready(function() {
	
	// ------------- APPLICATION BASE URL ----------- //
	var baseUrl = $('#base-url').val();

	// ------------- ON CLICK FIND VISA -------------- //
	$(document).on('click', '#btn-find-visa', function(e) {
		e.preventDefault();
		removeErrorMessages();

		var self = $(this);
			selfHtml = self.html();
			passportNo = $('#passport-no').val();
			nationality = $('#nationality').val();
			dateOfBirth = $('#date-of-birth').val();
			captcha = $('#captcha').val();
			captchaVal = $('#captcha-value').val();
			type = $('#type').val();
			message = '';
			flag = true;

		if (passportNo == '') {
			$('#passport-no').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
		}

		if (dateOfBirth == '') {
			$('#date-of-birth').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
		}

		if (nationality == '') {
			$('#nationality').addClass('is-invalid').after('<span class="invalid-feedback">The field is required!</span>');
            flag = false;
		}

		if (captchaVal == '') {
			$('#captcha-value').addClass('is-invalid').after('<span class="invalid-feedback">The captcha is required!</span>');
            flag = false;
		} else {
			if (captcha != captchaVal) {
				alert('Invalid Captcha !');
				flag = false;
			}
		}

		if (flag) {
			// Button Loading
			self.addClass('disabled').html('<div style="text-align: center;" class="spinner-border"></div>');

			var form = $('#find-visa-form');
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
						if (response.visa) {
							// $('.search-body').addClass('d-none');
							// $('.result-body').removeClass('d-none');
							// $('#result-passport-no').text(response.visa.passport_no);
							// $('#result-nationality').text(response.visa.nationality);
							// $('#result-date-of-birth').text(response.visa.date_of_birth);

							// if (type == 'manual') {
							// 	$('#download-visa').attr('href', baseUrl + '/uploads/manual-visa/' + response.visa.file);
							// } else {
							// 	$('#download-visa').attr('href', baseUrl + '/visa/download/' + response.visa_id);
							// }

							var dowloadLink = (type == 'manual') ? baseUrl + '/uploads/manual-visa/' + response.visa.file : baseUrl + '/visa/download/' + response.visa_id;
							var link = document.createElement("a");

							link.download = name;
							link.href = dowloadLink;
						  	document.body.appendChild(link);
						  	link.click();
						  	document.body.removeChild(link);
							delete link;
						} else {
							alert('Visa not Found !');
						}
					} else {
						if (response?.errors) {
							showErrorMessages(response.errors);
						} else {
							alert('Visa not Found !');
						}
					}
				},
				error: function() {
					alert('Something went wrong !');
				},
				complete: function() {
					self.removeClass('disabled').html(selfHtml);
				}
			});
		}
	});

});