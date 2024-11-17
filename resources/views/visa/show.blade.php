<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <style>
         body { @font-face { font-family: "Cairo"; src: url('/assets/fonts/cairo/cairo.ttf') format('truetype'); font-weight: bold; font-style: normal; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Cairo'; }
        .visa-table th {
            color: #20365c;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            font-size: 1.4em;
            text-align: center;
            background-color: #eeeeee;
            padding: 10px;
            /* Add padding to the top, bottom, left, and right */
        }

        .visa-table td {
            color: #2F5496;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            font-size: 24px;
            text-shadow: 0.8px 0.8px 0 #4574b8;
            text-align: center;
            background-color: #eeeeee;
        }

        .section h2 {
            padding-bottom: 10px;
            color: #4574b8;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            font-size: 24px;
            text-shadow: 0.8px 0.8px 0 #4574b8;
        }

        .left {
            padding-left: 10px;
        }

        .right {
            padding-right: 10px;
        }

        .horizontal-line {
            padding-top: 10px;
            padding-left: 57px;
            padding-right: 57px;
        }

        .horizontal-line hr {
            height: 2px;
            background-color: #cccccc;
            border: none;
        }

        .section {
            padding-top: 10px;
            padding-left: 57px;
            padding-right: 57px;
            padding-bottom: 0px;
        }

        .visa-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .visa-table tr {
            border-bottom: 2px solid #cccccc;
        }

        .visa-table tr:first-child {
            border-top: 2px solid #cccccc;
        }

        .visa-table th {
            width: 25%;
        }

        .visa-table th:first-child {
            text-align: left;
        }

        .visa-table th:last-child {
            text-align: right;
        }

        .visa-table td {
            width: 50%;
        }

        .instructions {
            font-size: 0.85em;
            color: #777;
            text-align: center;
            padding-bottom: 20px;
        }

        /* .footer {
            padding-top: 20px;
            padding-bottom: 40px;
            padding-right: 57px;
            padding-left: 57px;
            text-align: center;
            font-size: 0.9em;
            color: #555;
        } */
    }
    </style>

</head>

<body>
    <div style="position:relative; width: 100%; overflow: hidden;">
        <!-- Background Image (container) -->
        <img src="{{ public_path('/assets/images/head.png') }}" alt="Head image"
            style="width: 100%; height: 100%; object-fit: cover; border-bottom: 5px solid #002e6e;" />

        <!-- QR Code Image, positioned relative to the background image -->
        <img src="{{ $qrCode }}" alt="QR Code"
            style="position: absolute; width: 15%; height: auto; top: 16%; left: 3%; border-width: 8px; border-color: #ffffff;" />
    </div>
    <div class="section">
        <table style="width: 100%;" class="heading-table mt-15">
            <tr>
                <!-- Arabic on the left with right-to-left text direction -->
                <td class="left" style="text-align: left; direction: rtl;">
                    <h2>Visa Details</h2>
                </td>
                <!-- English on the right -->
                <td class="right" style="text-align: right;">
                    <h2>بيانات التأشيرة</h2>
                </td>
            </tr>
        </table>

        <table class="visa-table">
            <tr>
                <th>Visa Number</th>
                <td>{{ $visa->visa_no }}</td>
                <th>رقم التأشيرة</th>
            </tr>
            <tr>
                <th>Visa Type</th>
                <td>{{ $visa->visa_type_arabic }}<br>{{ $visa->visa_type_english }}</td>
                <th>نوع التأشيرة</th>
            </tr>
            <tr>
                <th>Visa Purpose</th>
                <td>{{ $visa->visa_purpose_arabic }}<br>{{ $visa->visa_purpose_english }}</td>
                <th>الغرض</th>
            </tr>
            <tr>
                <th>Date of Issue</th>
                <td>{{ \Carbon\Carbon::parse($visa->date_of_issue)->format('d-m-y') }}</td>
                <th>تاريخ الإصدار</th>

            </tr>
            <tr>
                <th>Date of Expiry</th>
                <td>{{ \Carbon\Carbon::parse($visa->date_of_expiry)->format('d-m-y') }}</td>
                <th>تاريخ انتهاء الصلاحية</th>
            </tr>
            <tr>
                <th>Place of Issue</th>
                <td>{{ $visa->place_of_issue }}</td>
                <th>مكان الإصدار</th>
            </tr>
        </table>
    </div>
    <div class="horizontal-line">
        <hr>
    </div>

    <div class="section">
        <table style="width: 100%;" class="heading-table mt-15">
            <tr>
                <!-- English on the left with right-to-left text direction -->
                <td class="left" style="text-align: left; direction: rtl;">
                    <h2>Visa Holder Details</h2>
                </td>
                <!-- Arabic on the right -->
                <td class="right" style="text-align: right;">
                    <h2>بيانات صاحب التأشيرة</h2>
                </td>
            </tr>
        </table>
        <table class="visa-table">
            <tr>
                <th>Full Name</th>
                <td>{{ $visa->fullname_arabic }}<br>{{ $visa->fullname_english }}</td>
                <th>الاسم الكامل</th>
            </tr>
            <tr>
                <th>MOI Reference</th>
                <td>{{ $visa->moi_refrence }}</td>
                <th>مرجع وزارة الداخلية</th>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>{{ $visa->nationality }}</td>
                <th>الجنسية</th>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $visa->gender }}</td>
                <th>النوع</th>
            </tr>
            <tr>
                <th>Occupation</th>
                <td>{{ $visa->occupation_english }}<br>{{ $visa->occupation_arabic }}</td>
                <th>المهنة</th>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ \Carbon\Carbon::parse($visa->date_of_birth)->format('d-m-y') }}</td>
                <th>تاريخ الميلاد</th>
            </tr>
            <tr>
                <th>Passport No.</th>
                <td>{{ $visa->passport_no }}</td>
                <th>رقم جواز السفر</th>
            </tr>
            <tr>
                <th>Place of Issue</th>
                <td>{{ $visa->place_of_issue }}</td>
                <th>مكان الإصدار</th>
            </tr>
            <tr>
                <th>Passport Type</th>
                <td>{{ $visa->passport_type }}</td>
                <th>نوع الجواز</th>
            </tr>
            <tr>
                <th>Expiry Date</th>
                <td>{{ \Carbon\Carbon::parse($visa->holder_expiry_date)->format('d-m-y') }}</td>
                <th>تاريخ انتهاء الصلاحية</th>
            </tr>
        </table>
    </div>
    <div class="horizontal-line">
        <hr>
    </div>

    <div class="section">
        <table style="width: 100%;" class="heading-table mt-15">
            <tr>
                <!-- English on the left with right-to-left text direction -->
                <td class="left" style="text-align: left; direction: rtl;">
                    <h2>Employer/Family <br>Breadwinner Details</h2>
                </td>
                <!-- Arabic on the right -->
                <td class="right" style="text-align: right; vertical-align: top;">
                    <h2>تفاصيل صاحب العمل / معيل الأسرة</h2>
                </td>
            </tr>
        </table>

        <table class="visa-table">
            <tr>
                <th>Full Name</th>
                <td>{{ $visa->company_fullname_arabic }}</td>
                <th>الاسم الكامل</th>
            </tr>
            <tr>
                <th>MOI Reference For Family</th>
                <td>{{ $visa->moi_refrence_family }}</td>
                <th>مرجع وزارة الداخلية للعائلة</th>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{ $visa->mobile_no }}</td>
                <th>رقم الهاتف المحمول</th>
            </tr>
        </table>
    </div>
    <div class="horizontal-line">
        <hr>
    </div>

    <div class="above-footer"
        style="display: flex; justify-content: space-between; align-items: center; padding: 20px 57px;">
        <!-- Left Section with Text and Signature -->
        <div style="text-align: left;">
            <p style="color: #0D4B91; font-size: 16px; margin: 0;">
                مدير عام الإدارة العامة لشؤون الإقامة<br>
                العميد/ يوسف حامد الأبوب
            </p>
            <img src="{{ public_path('/assets/images/sign.png') }}" alt="Signature"
                style="margin-top: -48px;max-width: 182px;">
        </div>

        <!-- Right Section with QR Code and Text -->
        <div style="text-align: right; display:flex; flex-direction:row; justify-content:space-between; width:25%">
            <img src="{{ $pdfQrCode }}" alt="QR Code" style="width:33%;" />
            <span style="color: #0D4B91; font-size: 16px; margin: 0; padding-right:10px;">
                تعليمات مهمة<br>
                <span style="font-size: 14px; color: #0D4B91;">Important Instructions</span>
            </span>
        </div>
    </div>
    {{--  Background Image (container) --}}
    <div style="width: 100%;">
        <img src="{{ public_path('/assets/images/footer.png') }}" alt="footer"
            style="width: 100%; height: 100%; object-fit: cover;" />
    </div>
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa PDF</title>
    
      
    <style>
        
       body { @font-face { font-family: "Cairo"; src: url('/assets/fonts/cairo/cairo.ttf') format('truetype'); font-weight: bold; font-style: normal; }
        @page {
            background: url('/assets/images/pdf-background.jpg') no-repeat 0 0;
            background-image-resize: 6;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Cairo'; }
        .header { height: 170px; width: 100%; }
        .qr-spacing { height: 25px; }
        .qr img { margin-left: 30px; }
        .context { position: absolute; width: 734px; font-weight: bold; color: #2F5496; font-size: 14px; text-align: center; margin-left: 30px; margin-right: 30px; left: 0; }
        #visa1 { margin-top: 38px; }
        #visa2 { margin-top: 65px; }
        #visa3 { margin-top: 85px; }
        #visa4 { margin-top: 110px; }
        #visa5 { margin-top: 130px; }
        #visa6 { margin-top: 158px; }
        #visa7 { margin-top: 185px; }
        #visa8 { margin-top: 210px; }
        #visa9 { margin-top: 285px; }
        #visa10 { margin-top: 305px; }
        #visa11 { margin-top: 330px; }
        #visa12 { margin-top: 355px; }
        #visa13 { margin-top: 383px; }
        #visa14 { margin-top: 410px; }
        #visa15 { margin-top: 435px; }
        #visa16 { margin-top: 463px; }
        #visa17 { margin-top: 490px; }
        #visa18 { margin-top: 516px; }
        #visa19 { margin-top: 543px; }
        #visa20 { margin-top: 635px; }
        #visa21 { margin-top: 663px; }
        #visa22 { margin-top: 692px; }
    }
    </style> 
</head> --}}
{{-- <body>
    <div class="header">
        <div class="qr">
            <div class="qr-spacing"></div>
            <img style="margin-left: 20px;" src="{{ url('/uploads/qrcodes/qr_code_with_logo.png') }}" width="120" alt="QR Code">
        </div>
    </div>
    <div class="context" id="visa1">{{ $visa->visa_no }}</div>
    <div class="context" id="visa2">{{ $visa->visa_type_arabic }}</div>
    <div class="context" id="visa3">{{ $visa->visa_type_english }}</div>
    <div class="context" id="visa4">{{ $visa->visa_purpose_arabic }}</div>
    <div class="context" id="visa5">{{ $visa->visa_purpose_english }}</div>
    <div class="context" id="visa6">{{ $visa->date_of_issue }}</div>
    <div class="context" id="visa7">{{ $visa->date_of_expiry }}</div>
    <div class="context" id="visa8">{{ $visa->place_of_issue }}</div>
    <div class="context" id="visa9">{{ $visa->fullname_arabic }}</div>
    <div class="context" id="visa10">{{ $visa->fullname_english }}</div>
    <div class="context" id="visa11">{{ $visa->moi_refrence }}</div>
    <div class="context" id="visa12">{{ $visa->nationality }}</div>
    <div class="context" id="visa13">
        @if ($visa->gender == 'male')
            Male ذكر
        @elseif($visa->gender == 'female')
            Female أنثى
        @else
            Other أخرى
        @endif
    </div>
    <div class="context" id="visa14">{{ $visa->occupation_english . '  ' . $visa->occupation_arabic }}</div>
    <div class="context" id="visa15">{{ $visa->date_of_birth }}</div>
    <div class="context" id="visa16">{{ $visa->passport_no }}</div>
    <div class="context" id="visa17">{{ $visa->place_of_issue }}</div>
    <div class="context" id="visa18">{{ $visa->passport_type }}</div>
    <div class="context" id="visa19">{{ $visa->holder_expiry_date }}</div>
    <div class="context" id="visa20">{{ $visa->company_fullname_arabic }}</div>
    <div class="context" id="visa21">{{ $visa->moi_refrence_family }}</div>
    <div class="context" id="visa22">{{ $visa->mobile_no }}</div>

    <div class="container">
        <table style="width: 100%;" class="heading-table mt-15">
            <tr>
                <td class="left">Visa Details</td>
                <td class="right">بيانات التأشيرة</td>
            </tr>
        </table>
        <table style="width: 100%;" class="visa-table">
            <tbody>
                <tr class="border">
                    <td>Visa Number</td>
                    <td class="highlight">{{ $visa->visa_no }}</td>
                    <td class="right">رقم التأشيرة</td>
                </tr>
                <tr class="border">
                    <td>Visa Type</td>
                    <td class="highlight"><center>{{ $visa->visa_type_arabic }}<br>{{ $visa->visa_type_english }}</center></td>
                    <td class="right">نوع التأشيرة</td>
                </tr>
                <tr class="border">
                    <td>Visa Purpose</td>
                    <td class="highlight"><center>{{ $visa->visa_purpose_arabic }}<br>{{ $visa->visa_purpose_english }}</center></td>
                    <td class="right">الغرض</td>
                </tr>
                <tr class="border">
                    <td>Date Of Issue</td>
                    <td class="highlight"><center>{{ $visa->date_of_issue }}</center></td>
                    <td class="right">تاريخ الإصدار</td>
                </tr>
                <tr class="border">
                    <td>Date Of Expiry</td>
                    <td class="highlight"><center>{{ $visa->date_of_expiry }}</center></td>
                    <td class="right">تاريخ الإنتهاء</td>
                </tr>
                <tr class="border">
                    <td>Place of Issue</td>
                    <td class="highlight"><center>{{ $visa->place_of_issue_arabic }}</center></td>
                    <td class="right">مكان الإصدار</td>
                </tr>
            </tbody>
        </table>
        <hr style="border: 1px solid; border-color: #DCDCDC;">
        <table style="width: 100%;" class="heading-table">
            <tr>
                <td class="left">Visa Holder Details</td>
                <td class="right">بيانات صاحب التأشيرة</td>
            </tr>
        </table>
        <table style="width: 100%;" class="visa-table">
            <tbody>
                <tr class="border">
                    <td>Full Name</td>
                    <td class="highlight">{{ $visa->fullname_arabic }}<br> {{ $visa->fullname_english }}</td>
                    <td class="right">الاسم الكامل</td>
                </tr>
                <tr class="border">
                    <td>MOI Reference</td>
                    <td class="highlight">{{ $visa->moi_refrence }}</td>
                    <td class="right">مرجع وزارة الداخلية</td>
                </tr>
                <tr class="border">
                    <td>Nationality</td>
                    <td class="highlight">{{ $visa->nationality }}</td>
                    <td class="right">الجنسية</td>
                </tr>
                <tr class="border">
                    <td>Gender</td>
                    <td class="highlight">
                        @if ($visa->gender == 'male')
                            Male ذكر
                        @elseif($visa->gender == 'female')
                            Female أنثى
                        @else
                            Other أخرى
                        @endif
                    </td>
                    <td class="right">الجنس</td>
                </tr>
                <tr class="border">
                    <td>Occupation</td>
                    <td class="highlight">{{ $visa->occupation_arabic }} {{ $visa->occupation_english }}</td>
                    <td class="right">المهنة</td>
                </tr>
                <tr class="border">
                    <td>Date Of Birth</td>
                    <td class="highlight">{{ $visa->date_of_birth }}</td>
                    <td class="right">تاريخ الميلاد</td>
                </tr>
                <tr class="border">
                    <td>Passport Number</td>
                    <td class="highlight">{{ $visa->passport_no }}</td>
                    <td class="right">رقم جواز السفر</td>
                </tr>
                <tr class="border">
                    <td>Passport Place Of Issue</td>
                    <td class="highlight">{{ $visa->place_of_issue }}</td>
                    <td class="right">مكان الإصدار</td>
                </tr>
                <tr class="border">
                    <td>Passport Type</td>
                    <td class="highlight">{{ $visa->passport_type }}</td>
                    <td class="right">نوع الجواز</td>
                </tr>
                <tr class="border">
                    <td>Passport Expiry</td>
                    <td class="highlight">{{ $visa->holder_expiry_date }}</td>
                    <td class="right">تاريخ انتهاء الجواز</td>
                </tr>
            </tbody>
        </table>
        <hr style="border: 1px solid; border-color: #DCDCDC;">
        <table style="width: 100%;" class="heading-table">
            <tr>
                <td class="left">Visa Sponsor Details</td>
                <td class="right">بيانات الكفيل</td>
            </tr>
        </table>
        <table style="width: 100%;" class="visa-table">
            <tbody>
                <tr class="border">
                    <td>Company Fullname</td>
                    <td class="highlight">{{ $visa->company_fullname_arabic }}</td>
                    <td class="right">الاسم الكامل</td>
                </tr>
                <tr class="border">
                    <td>MOI Reference For Family</td>
                    <td class="highlight">{{ $visa->moi_refrence_family }}</td>
                    <td class="right">مرجع وزارة الداخلية للعائلة</td>
                </tr>
                <tr class="border">
                    <td>Mobile Number</td>
                    <td class="highlight">{{ $visa->mobile_no }}</td>
                    <td class="right">رقم الجوال</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>  --}}
{{-- </html> --}}
