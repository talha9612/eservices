<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .header {
            background-image: url('../assets/images/header.png');
            background-size: cover; /* Ensures the image covers the entire width */
            background-position: center;
            background-repeat: no-repeat;
            height: 450px; /* Fixed height for header */
            position: relative;
        }

        .header h1 {
            color: white;
            font-size: 2em;
            font-weight: bold;
            position: absolute;
        }

        .header img {
            position: absolute;
            top: 10px;
            right: 20px;
            width: 50px;
        }

        .section {
            padding: 20px;
        }
        .qr-code {
            position: absolute;
            top: 10px;
            left: 20px; /* Adjust as necessary */
            width: 100px; /* Adjust the width of the QR code */
        }
        h2 {
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            font-size: 1.2em;
            color: #405a93;
        }

        .visa-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .visa-table th, .visa-table td {
            padding: 12px;
            text-align: center;
            font-size: 0.9em;
            border: 1px solid #ddd;
            background-color: #f0f0f0;
        }

        .visa-table th {
            width: 25%;
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

        .footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #ddd;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img class="qr-code" src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
            {{-- <img src="kuwait-logo.png" alt="Kuwait Logo"> --}}
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
                    <td>12345678</td>
                    <th>رقم التأشيرة</th>
                </tr>
                <tr>
                    <th>Visa Type</th>
                    <td>Tourist</td>
                    <th>نوع التأشيرة</th>
                </tr>
                <tr>
                    <th>Visa Purpose</th>
                    <td>Visit</td>
                    <th>غرض التأشيرة</th>
                </tr>
                <tr>
                    <th>Date of Issue</th>
                    <td>2024-10-20</td>
                    <th>تاريخ الإصدار</th>
                </tr>
                <tr>
                    <th>Date of Expiry</th>
                    <td>2024-12-20</td>
                    <th>تاريخ انتهاء الصلاحية</th>
                </tr>
                <tr>
                    <th>Place of Issue</th>
                    <td>Kuwait</td>
                    <th>مكان الإصدار</th>
                </tr>
            </table>
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
                    <td>John Doe</td>
                    <th>الاسم الكامل</th>
                </tr>
                <tr>
                    <th>MOI Reference</th>
                    <td class="highlight">{{ $visa->moi_refrence }}</td>
                    <th>مرجع وزارة الداخلية</th>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>American</td>
                    <th>الجنسية</th>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>Male</td>
                    <th>النوع</th>
                </tr>
                <tr>
                    <th>Occupation</th>
                    <td>Engineer</td>
                    <th>المهنة</th>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>1985-05-15</td>
                    <th>تاريخ الميلاد</th>
                </tr>
                <tr>
                    <th>Passport No.</th>
                    <td>A12345678</td>
                    <th>رقم جواز السفر</th>
                </tr>
                <tr>
                    <th>Place of Issue</th>
                    <td>USA</td>
                    <th>مكان الإصدار</th>
                </tr>
                <tr>
                    <th>Passport Type</th>
                    <td class="highlight">{{ $visa->passport_type }}</td>
                    <th>نوع الجواز</th>
                </tr>
                <tr>
                    <th>Expiry Date</th>
                    <td>2026-05-15</td>
                    <th>تاريخ انتهاء الصلاحية</th>
                </tr>
            </table>
        </div>

        <div class="section">
            <table style="width: 100%;" class="heading-table mt-15">
                <tr>
                    <!-- English on the left with right-to-left text direction -->
                    <td class="left" style="text-align: left; direction: rtl;">
                        <h2>Employer/Family Breadwinner Details</h2>
                    </td>
                    <!-- Arabic on the right -->
                    <td class="right" style="text-align: right;">
                        <h2>تفاصيل صاحب العمل / معيل الأسرة</h2>
                    </td>
                </tr>
            </table>
            
            <table class="visa-table">
                <tr>
                    <th>Full Name</th>
                    <td>Jane Doe</td>
                    <th>الاسم الكامل</th>
                </tr>
                <tr>
                    <th>MOI Reference For Family</th>
                    <td class="highlight">{{ $visa->moi_refrence_family }}</td>
                    <th>مرجع وزارة الداخلية للعائلة</th>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>+123 456 7890</td>
                    <th>رقم الهاتف المحمول</th>
                </tr>
            </table>
        </div>

        <div class="instructions">
            <p>Important Instructions: Keep this document for your records.</p>
        </div>

        <div class="footer">
            <p>General Department of Public Affairs - Kuwait</p>
        </div>
    </div>
</body>
</html>

{{--<!DOCTYPE html>
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
</head>--}}
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
        @if($visa->gender == 'male')
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
                        @if($visa->gender == 'male')
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
</html>
