<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="{{ url('/assets/images/logo.jpg') }}">
	<title>Kuwait Visa Service</title>
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('/assets/dist/css/adminlte.min.css') }}">
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ url('/assets/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Custome Style -->
	<link rel="stylesheet" href="{{ url('/assets/dist/css/style.css') }}">
	<!-- jQuery UI -->
  	<link rel="stylesheet" href="{{ url('/assets/plugins/jquery-ui/jquery-ui.min.css') }}">
	<!-- Font Style -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header">
					<div class="content">
						{{-- <img src="{{ url('/assets/images/kuwait-police-logo.png') }}" class="logo-one">
					    <h2>Employment Visa Online - State of Kuwait <br>تأشيرة العمل عبر الإنترنت - دولة الكويت</h2>
						<img src="{{ url('/assets/images/kuwait-police-logo-2.png') }}" class="logo-two"> --}}
						<img src="{{ url('/assets/images/banner-2.jpg') }}" class="logo-one">
					</div>
					<nav>
				        <div class="hamburger" onclick="toggleMenu()">
				            &#9776;
				        </div>
				        <ul id="menu">
				            <li><a href="{{ route('home') }}">Home</a></li>
				            <li><a href="{{ route('about') }}">About Us</a></li>
				            <li><a href="{{ route('service') }}">Visa Services</a></li>
				            <li><a href="{{ route('contact') }}">Contact</a></li>
				            <li><a href="{{ route('faq') }}">FAQ</a></li>
				            <li><a href="{{ route('visa.show', '1') }}">View Visa</a></li>
				        </ul>
				    </nav>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content">
		@yield('main-content')
	</div>
	<footer>
		<p>All Rights Reserved for Ministry of Interior – State of Kuwait © {{ date('Y') }}</p>
	</footer>
</body>
<input type="hidden" value="{{ url('/') }}" id="base-url">
<input type="hidden" value="dd/mm/yy" id="date-format-in-js">
<!-- jQuery -->
<script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ url('/assets/js/custom.js') }}"></script>
<script>
	function toggleMenu() {
	    const menu = document.getElementById('menu');
	    menu.classList.toggle('expanded');
	}
</script>
@yield('scripts')
</html>