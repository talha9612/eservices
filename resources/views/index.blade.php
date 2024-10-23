@extends('master')
@section('main-content')
<style>
	a.link { color: #054c98; }
	a.link:hover { color: #0c243d; }
</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="video">
					<video style="width: 100%;" loop="" muted="" autoplay="" oncanplay="this.play()" onloadedmetadata="this.muted = true"><source _ngcontent-ng-c1231041586="" src="{{ url('/assets/videos/academy-register.mp4') }}" type="video/mp4"></video>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 py-10">
				<br>
				<p>This website is operated and controlled by the Ministry of Interior, State of Kuwait. Here you can get details of Employment visa related updates and can easily download the visa copy from this site after the visa is issued.</p>
				<p class="text-right">ييتم تشغيل هذا الموقع الإلكتروني وإدارته من قبل وزارة الداخلية بدولة الكويت. يمكنك هنا الحصول على تفاصيل التحديثات المتعلقة بتأشيرة العمل ويمكنك بسهولة تنزيل نسخة التأشيرة من هذا الموقع بعد إصدار التأشيرة</p>
				<br><br>
				<p>All visa-related information from the Ministry of Interior is displayed here. The necessary links are provided for all the information you need. You will get all the updated information by entering the link and filling in all the requested information correctly and clicking on the submit button.</p>
				<p class="text-right">يتم عرض جميع المعلومات المتعلقة بالتأشيرة من وزارة الداخلية هنا. يتم توفير الروابط اللازمة لجميع المعلومات التي تحتاجها. ستحصل على جميع المعلومات المحدثة عن طريق إدخال الرابط وملء جميع المعلومات المطلوبة بشكل صحيح والنقر على زر الإرسال</p>
				<br><br>
				<h6>Manual Visa</h6>
				<p>To check all information thoroughly, click on <a class="link" href="https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec">https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec</a> link, there you will find the Visa Application Status link. For Manual Visa by clicking on the mentioned link, enter the Captcha with Application Number, Visa Number,Entry Number,Position Number and Application Status Number and submit. You can see APPROVED in the top place where you entered the number at the moment of submission. If you see Approved, you will understand that all the information of your visa is correct.</p>
				<h6 class="text-right">تأشيرة يدوية</h6>
				<p class="text">للتحقق من كافة المعلومات بدقة، انقر على <a class="link" href="https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec">الرابط</a>، حيث ستجد رابط حالة طلب التأشيرة. للحصول على تأشيرة يدوية، انقر على الرابط المذكور، وأدخل رمز التحقق مع رقم الطلب ورقم التأشيرة ورقم الدخول ورقم الوظيفة ورقم حالة الطلب وأرسل. يمكنك رؤية كلمة <strong>تمت الموافقة عليها</strong> في المكان العلوي حيث أدخلت الرقم في لحظة الإرسال. إذا رأيت كلمة تمت الموافقة عليها، فستفهم أن جميع معلومات تأشيرتك صحيحة.</p>
				<br><br>
				<h6>e-Visa</h6>
				<p>To check all information thoroughly, click on <a class="link" href="https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec">https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec</a>  link, there you will find the Visa Application Status link. For e-Visa by clicking on the mentioned link, enter the Captcha with e-Visa Number, 2 (Two) MOI Numbers and submit. You can see APPROVED in the top place where you entered the number at the moment of submission. If you see Approved, you will understand that all the information of your visa is correct.</p>
				<h6 class="text-right">التأشيرة الإلكترونية</h6>
				<p class="text-right">ل	 حيث ستجد رابط حالة طلب التأشيرة. للحصول على التأشيرة الإلكترونية، انقر على الرابط المذكور، وأدخل رمز التحقق مع رقم التأشيرة الإلكترونية ورقمين (اثنين) من وزارة الداخلية وأرسل. يمكنك رؤية كلمة تمت الموافقة عليها في المكان العلوي حيث أدخلت الرقم في لحظة الإرسال. إذا رأيت كلمة تمت الموافقة عليها، فستفهم أن جميع معلومات تأشيرتك صحيحة</p>
			</div>
		</div>
	</div>
@endsection