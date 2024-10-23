<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa PDF</title>
     <style>
  /* Reset styles for html and body */
  html, body {
            height: 100%; /* Full height */
            margin: 0; /* Remove default margin */
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        /* Set the background image on the body */
        body {
            background-image: url('{{ asset('/assets/images/pdf-background.jpg') }}');
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: contain; /* Make sure the entire image is displayed */
            background-position: top center; /* Position the image at the top center */
            height: 1000px; /* Set this to the height of your image in pixels */
            padding: 0; /* Reset padding */
        }

        /* Content styles */
        .content {
            position: relative; /* Position content above the background */
            color: black; /* Text color (adjust as needed) */
            text-align: center; /* Center text */
            padding: 20px; /* Add padding for readability */
            z-index: 1; /* Ensure content is above the background */
        }

        /* Ensure the content is tall enough to require scrolling */
        .extra-content {
            height: 150vh; /* This should be enough to ensure scrolling */
            background-color: rgba(255, 255, 255, 0.7); /* Light background for contrast */
            padding: 20px; /* Add padding for readability */
            border-radius: 8px; /* Optional: round corners */
            margin: 20px auto; /* Center the content */
            max-width: 800px; /* Limit width of the content */
        }
    </style> 
    {{-- <style>
        
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
    </style> --}}
</head>
 {{-- <body>
    <div class="background">
    <img src="{{ asset('assets/images/your-background-image.jpg') }}" alt="Background">
        </div>
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
