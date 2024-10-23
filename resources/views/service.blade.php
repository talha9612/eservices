@extends('master')
@section('main-content')
<div class="container-fluid Regular">
	{{-- <div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<img src="assets/images/banner.jpg" style="width: 100%;margin-top: 25px;" class="Regular shadow" alt="banner image">
		</div>
		<div class="col-md-3"></div>
	</div> --}}
	<div class="row" style="margin-top: 100px;">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="service-box">
						<img src="{{ url('/assets/images/kuwait-police-logo-2.png') }}">
						<a href="{{ route('visa.query') }}" class="highlight" style="color: black;">المعلومات والاستفسارات المتعلقة بالهجرة <br>Visa Related Information And Inquiries</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="service-box">
						<img src="{{ url('/assets/images/kuwait-police-logo-2.png') }}">
						<a class="highlight" href="{{ route('visa.find') }}">المعلومات والاستفسارات المتعلقة بالهجرة< <br>Download Or Print The Visa Copy Online</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h3>Use the “Visa Inquiry” service to:</h3>
			<br>
			<ul>
				<li>(A) Click on the VISA RELATED INFORMATION AND INQUIRIES button to know the correct information of the visa application. Fill in the requested information correctly and type the Captcha correctly then click on Find to see / know all the correct information related to the visa.</li>
				<br>
				<br>
				<li>(B) If your desired visa has been issued then click on DOWNLOAD OR PRINT THE VISA COPY ONLINE button. Clicking on that button will show the option of Manual Visa and e-Visa. Click on the button for the type of visa you want to view / download or print. Fill the requested information correctly and type the captcha correctly then click on Find to see/know all the correct information related to the visa. The issued visa will show here automatically. You can then view / download / print the visa copy.</li>
			</ul>
			<br>
			<div class="audio">
				<audio controls="" autoplay="" loop="" preload="auto"><source src="{{ url('assets/audio/kw_full.mp3') }}" type="audio/mpeg"></audio>
			</div>
		</div>
	</div>
</div>
@endsection
