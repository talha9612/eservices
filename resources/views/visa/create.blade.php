@extends('layout.app')
@section('page-title', $data['page_title'])
@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $data['page_title'] }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ $data['menu'] }}</a></li>
              <li class="breadcrumb-item active">{{ $data['page_title'] }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title"><i class="fa fa-file"></i> {{ $data['page_title'] }}</div>
              </div>
              <div class="card-body">
                <form action="{{ route('visa.store') }}" id="create-visa-form" enctype="multipart/form-data">
                  <div class="row">
                    <h2 style="text-align: center; width: 100%;">Details Visa. ﺑﻴﺎﻧﺎت اﻟﺘﺄﺷﻴﺮة</h2>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Visa Number: <span class="error">*</span></label>
                        <input type="number" name="visa_no" id="visa-no" class="form-control" placeholder="Enter Visa No">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Type in Arabic <span class="error">*</span></label>
                        <input type="text" name="visa_type_arabic" id="visa-type-arabic" class="form-control" placeholder="ﻧﻮع اﻟﺘﺄﺷﻴﺮة">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Type in English <span class="error">*</span></label>
                        <input type="text" name="visa_type_english" id="visa-type-english" class="form-control" placeholder="Enter Visa Type">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Purpose in Arabic <span class="error">*</span></label>
                        <input type="text" name="visa_purpose_arabic" id="visa-purpose-arabic" class="form-control" placeholder="اﻟﻐﺮض">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Purpose in English <span class="error">*</span></label>
                        <input type="text" name="visa_purpose_english" id="visa-purpose-english" class="form-control" placeholder="Enter Visa Type">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Issuance <span class="error">*</span></label>
                        <input type="date" name="date_of_issue" id="date-of-issue" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Expiry <span class="error">*</span></label>
                        <input type="date" name="date_of_expiry" id="date-of-expiry" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Place of Issue In Arabic <span class="error">*</span></label>
                        <input type="text" name="place_of_issue_arabic" id="place-of-issue-arabic" class="form-control" placeholder="Place Of Issue In Arabic ex: ادارة ﻋﻤﻞ ﻣﺤﺎﻓﻈﺔ اﻟﻔﺮواﻧﻴﺔ">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h2 style="text-align: center; width: 100%;">Details Holder Visa. ﺑﻴﺎﻧﺎت ﺻﺎﺣﺐ اﻟﺘﺄﺷﻴﺮة</h2>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fullname in Arabic <span class="error">*</span></label>
                        <input type="text" name="fullname_arabic" id="fullname-arabic" class="form-control" placeholder="اﻻﺳﻢ اﻟﻜﺎﻣﻞ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fullname in English <span class="error">*</span></label>
                        <input type="text" name="fullname_english" id="fullname-english" class="form-control" placeholder="Enter Fullname">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>MOI Reference: <span class="error">*</span></label>
                        <input type="text" name="moi_refrence" id="moi-refrence" class="form-control" placeholder="Enter MOI Refrence">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nationality <span class="error">*</span></label>
                        <select name="nationality" id="nationality" class="form-control select2">
                          <option value="">Select Nationality</option>
                          <option value="Afghanistan أفغانستان">Afghanistan أفغانستان</option>
                          <option value="Albania ألبانيا">Albania ألبانيا</option>
                          <option value="Algeria الجزائر">Algeria الجزائر</option>
                          <option value="Andorra أندورا">Andorra أندورا</option>
                          <option value="Angola أنغولا">Angola أنغولا</option>
                          <option value="Antigua and Barbuda أنتيغوا وبربودا">Antigua and Barbuda أنتيغوا وبربودا</option>
                          <option value="Argentina الأرجنتين">Argentina الأرجنتين</option>
                          <option value="Armenia أرمينيا">Armenia أرمينيا</option>
                          <option value="Australia أستراليا">Australia أستراليا</option>
                          <option value="Austria النمسا">Austria النمسا</option>
                          <option value="Azerbaijan أذربيجان">Azerbaijan أذربيجان</option>
                          <option value="Bahamas الباهاما">Bahamas الباهاما</option>
                          <option value="Bahrain البحرين">Bahrain البحرين</option>
                          <option value="Bangladesh بنغلاديش">Bangladesh بنغلاديش</option>
                          <option value="Barbados بربادوس">Barbados بربادوس</option>
                          <option value="Belarus روسيا البيضاء">Belarus روسيا البيضاء</option>
                          <option value="Belgium بلجيكا">Belgium بلجيكا</option>
                          <option value="Belize بليز">Belize بليز</option>
                          <option value="Benin بنين">Benin بنين</option>
                          <option value="Bhutan بوتان">Bhutan بوتان</option>
                          <option value="Bolivia بوليفيا">Bolivia بوليفيا</option>
                          <option value="Bosnia and Herzegovina البوسنة والهرسك">Bosnia and Herzegovina البوسنة والهرسك</option>
                          <option value="Botswana بوتسوانا">Botswana بوتسوانا</option>
                          <option value="Brazil البرازيل">Brazil البرازيل</option>
                          <option value="Brunei بروناي">Brunei بروناي</option>
                          <option value="Bulgaria بلغاريا">Bulgaria بلغاريا</option>
                          <option value="Burkina Faso بوركينا فاسو">Burkina Faso بوركينا فاسو</option>
                          <option value="Burundi بوروندي">Burundi بوروندي</option>
                          <option value="Cabo Verde الرأس الأخضر">Cabo Verde الرأس الأخضر</option>
                          <option value="Cambodia كمبوديا">Cambodia كمبوديا</option>
                          <option value="Cameroon الكاميرون">Cameroon الكاميرون</option>
                          <option value="Canada كندا">Canada كندا</option>
                          <option value="Central African Republic جمهورية أفريقيا الوسطى">Central African Republic جمهورية أفريقيا الوسطى</option>
                          <option value="Chad تشاد">Chad تشاد</option>
                          <option value="Chile شيلي">Chile شيلي</option>
                          <option value="China الصين">China الصين</option>
                          <option value="Colombia كولومبيا">Colombia كولومبيا</option>
                          <option value="Comoros جزر القمر">Comoros جزر القمر</option>
                          <option value="Congo الكونغو">Congo الكونغو</option>
                          <option value="Costa Rica كوستاريكا">Costa Rica كوستاريكا</option>
                          <option value="Croatia كرواتيا">Croatia كرواتيا</option>
                          <option value="Cuba كوبا">Cuba كوبا</option>
                          <option value="Cyprus قبرص">Cyprus قبرص</option>
                          <option value="Czechia التشيك">Czechia التشيك</option>
                          <option value="Denmark الدنمارك">Denmark الدنمارك</option>
                          <option value="Djibouti جيبوتي">Djibouti جيبوتي</option>
                          <option value="Dominica دومينيكا">Dominica دومينيكا</option>
                          <option value="Dominican Republic جمهورية الدومينيكان">Dominican Republic جمهورية الدومينيكان</option>
                          <option value="East Timor تيمور الشرقية">East Timor تيمور الشرقية</option>
                          <option value="Ecuador الإكوادور">Ecuador الإكوادور</option>
                          <option value="Egypt مصر">Egypt مصر</option>
                          <option value="El Salvador السلفادور">El Salvador السلفادور</option>
                          <option value="Equatorial Guinea غينيا الاستوائية">Equatorial Guinea غينيا الاستوائية</option>
                          <option value="Eritrea إريتريا">Eritrea إريتريا</option>
                          <option value="Estonia استونيا">Estonia استونيا</option>
                          <option value="Eswatini إسواتيني">Eswatini إسواتيني</option>
                          <option value="Ethiopia إثيوبيا">Ethiopia إثيوبيا</option>
                          <option value="Fiji فيجي">Fiji فيجي</option>
                          <option value="Finland فنلندا">Finland فنلندا</option>
                          <option value="France فرنسا">France فرنسا</option>
                          <option value="Gabon الغابون">Gabon الغابون</option>
                          <option value="Gambia غامبيا">Gambia غامبيا</option>
                          <option value="Georgia جورجيا">Georgia جورجيا</option>
                          <option value="Germany ألمانيا">Germany ألمانيا</option>
                          <option value="Ghana غانا">Ghana غانا</option>
                          <option value="Greece اليونان">Greece اليونان</option>
                          <option value="Grenada غرينادا">Grenada غرينادا</option>
                          <option value="Guatemala غواتيمالا">Guatemala غواتيمالا</option>
                          <option value="Guinea غينيا">Guinea غينيا</option>
                          <option value="Guinea-Bissau غينيا بيساو">Guinea-Bissau غينيا بيساو</option>
                          <option value="Guyana غيانا">Guyana غيانا</option>
                          <option value="Haiti هايتي">Haiti هايتي</option>
                          <option value="Honduras هندوراس">Honduras هندوراس</option>
                          <option value="Hungary المجر">Hungary المجر</option>
                          <option value="Iceland آيسلندا">Iceland آيسلندا</option>
                          <option value="India الهند">India الهند</option>
                          <option value="Indonesia إندونيسيا">Indonesia إندونيسيا</option>
                          <option value="Iran إيران">Iran إيران</option>
                          <option value="Iraq العراق">Iraq العراق</option>
                          <option value="Ireland أيرلندا">Ireland أيرلندا</option>
                          <option value="Israel إسرائيل">Israel إسرائيل</option>
                          <option value="Italy إيطاليا">Italy إيطاليا</option>
                          <option value="Jamaica جامايكا">Jamaica جامايكا</option>
                          <option value="Japan اليابان">Japan اليابان</option>
                          <option value="Jordan الأردن">Jordan الأردن</option>
                          <option value="Kazakhstan كازاخستان">Kazakhstan كازاخستان</option>
                          <option value="Kenya كينيا">Kenya كينيا</option>
                          <option value="Kiribati كيريباتي">Kiribati كيريباتي</option>
                          <option value="Korea, North كوريا الشمالية">Korea, North كوريا الشمالية</option>
                          <option value="Korea, South كوريا الجنوبية">Korea, South كوريا الجنوبية</option>
                          <option value="Kosovo كوسوفو">Kosovo كوسوفو</option>
                          <option value="Kuwait الكويت">Kuwait الكويت</option>
                          <option value="Kyrgyzstan قيرغيزستان">Kyrgyzstan قيرغيزستان</option>
                          <option value="Laos لاوس">Laos لاوس</option>
                          <option value="Latvia لاتفيا">Latvia لاتفيا</option>
                          <option value="Lebanon لبنان">Lebanon لبنان</option>
                          <option value="Lesotho ليسوتو">Lesotho ليسوتو</option>
                          <option value="Liberia ليبيريا">Liberia ليبيريا</option>
                          <option value="Libya ليبيا">Libya ليبيا</option>
                          <option value="Liechtenstein ليختنشتاين">Liechtenstein ليختنشتاين</option>
                          <option value="Lithuania ليتوانيا">Lithuania ليتوانيا</option>
                          <option value="Luxembourg لوكسمبورغ">Luxembourg لوكسمبورغ</option>
                          <option value="Madagascar مدغشقر">Madagascar مدغشقر</option>
                          <option value="Malawi ملاوي">Malawi ملاوي</option>
                          <option value="Malaysia ماليزيا">Malaysia ماليزيا</option>
                          <option value="Maldives المالديف">Maldives المالديف</option>
                          <option value="Mali مالي">Mali مالي</option>
                          <option value="Malta مالطا">Malta مالطا</option>
                          <option value="Marshall Islands جزر مارشال">Marshall Islands جزر مارشال</option>
                          <option value="Mauritania موريتانيا">Mauritania موريتانيا</option>
                          <option value="Mauritius موريشيوس">Mauritius موريشيوس</option>
                          <option value="Mexico المكسيك">Mexico المكسيك</option>
                          <option value="Micronesia ميكرونيزيا">Micronesia ميكرونيزيا</option>
                          <option value="Moldova مولدوفا">Moldova مولدوفا</option>
                          <option value="Monaco موناكو">Monaco موناكو</option>
                          <option value="Mongolia منغوليا">Mongolia منغوليا</option>
                          <option value="Montenegro الجبل الأسود">Montenegro الجبل الأسود</option>
                          <option value="Morocco المغرب">Morocco المغرب</option>
                          <option value="Mozambique موزمبيق">Mozambique موزمبيق</option>
                          <option value="Myanmar ميانمار">Myanmar ميانمار</option>
                          <option value="Namibia ناميبيا">Namibia ناميبيا</option>
                          <option value="Nauru ناورو">Nauru ناورو</option>
                          <option value="Nepal نيبال">Nepal نيبال</option>
                          <option value="Netherlands هولندا">Netherlands هولندا</option>
                          <option value="New Zealand نيوزيلندا">New Zealand نيوزيلندا</option>
                          <option value="Nicaragua نيكاراغوا">Nicaragua نيكاراغوا</option>
                          <option value="Niger النيجر">Niger النيجر</option>
                          <option value="Nigeria نيجيريا">Nigeria نيجيريا</option>
                          <option value="North Macedonia مقدونيا الشمالية">North Macedonia مقدونيا الشمالية</option>
                          <option value="Norway النرويج">Norway النرويج</option>
                          <option value="Oman عمان">Oman عمان</option>
                          <option value="Pakistan باكستان">Pakistan باكستان</option>
                          <option value="Palau بالاو">Palau بالاو</option>
                          <option value="Palestine فلسطين">Palestine فلسطين</option>
                          <option value="Panama بنما">Panama بنما</option>
                          <option value="Papua New Guinea بابوا غينيا الجديدة">Papua New Guinea بابوا غينيا الجديدة</option>
                          <option value="Paraguay باراغواي">Paraguay باراغواي</option>
                          <option value="Peru بيرو">Peru بيرو</option>
                          <option value="Philippines الفلبين">Philippines الفلبين</option>
                          <option value="Poland بولندا">Poland بولندا</option>
                          <option value="Portugal البرتغال">Portugal البرتغال</option>
                          <option value="Qatar قطر">Qatar قطر</option>
                          <option value="Romania رومانيا">Romania رومانيا</option>
                          <option value="Russia روسيا">Russia روسيا</option>
                          <option value="Rwanda رواندا">Rwanda رواندا</option>
                          <option value="Saint Kitts and Nevis سانت كيتس ونيفيس">Saint Kitts and Nevis سانت كيتس ونيفيس</option>
                          <option value="Saint Lucia سانت لوسيا">Saint Lucia سانت لوسيا</option>
                          <option value="Saint Vincent and the Grenadines سانت فنسنت والغرينادين">Saint Vincent and the Grenadines سانت فنسنت والغرينادين</option>
                          <option value="Samoa ساموا">Samoa ساموا</option>
                          <option value="San Marino سان مارينو">San Marino سان مارينو</option>
                          <option value="Sao Tome and Principe ساو تومي وبرينسيبي">Sao Tome and Principe ساو تومي وبرينسيبي</option>
                          <option value="Saudi Arabia المملكة العربية السعودية">Saudi Arabia المملكة العربية السعودية</option>
                          <option value="Senegal السنغال">Senegal السنغال</option>
                          <option value="Serbia صربيا">Serbia صربيا</option>
                          <option value="Seychelles سيشيل">Seychelles سيشيل</option>
                          <option value="Sierra Leone سيراليون">Sierra Leone سيراليون</option>
                          <option value="Singapore سنغافورة">Singapore سنغافورة</option>
                          <option value="Slovakia سلوفاكيا">Slovakia سلوفاكيا</option>
                          <option value="Slovenia سلوفينيا">Slovenia سلوفينيا</option>
                          <option value="Solomon Islands جزر سليمان">Solomon Islands جزر سليمان</option>
                          <option value="Somalia الصومال">Somalia الصومال</option>
                          <option value="South Africa جنوب أفريقيا">South Africa جنوب أفريقيا</option>
                          <option value="South Sudan جنوب السودان">South Sudan جنوب السودان</option>
                          <option value="Spain إسبانيا">Spain إسبانيا</option>
                          <option value="Sri Lanka سريلانكا">Sri Lanka سريلانكا</option>
                          <option value="Sudan السودان">Sudan السودان</option>
                          <option value="Suriname سورينام">Suriname سورينام</option>
                          <option value="Sweden السويد">Sweden السويد</option>
                          <option value="Switzerland سويسرا">Switzerland سويسرا</option>
                          <option value="Syria سوريا">Syria سوريا</option>
                          <option value="Taiwan تايوان">Taiwan تايوان</option>
                          <option value="Tajikistan طاجيكستان">Tajikistan طاجيكستان</option>
                          <option value="Tanzania تنزانيا">Tanzania تنزانيا</option>
                          <option value="Thailand تايلاند">Thailand تايلاند</option>
                          <option value="Togo توغو">Togo توغو</option>
                          <option value="Tonga تونغا">Tonga تونغا</option>
                          <option value="Trinidad and Tobago ترينيداد وتوباغو">Trinidad and Tobago ترينيداد وتوباغو</option>
                          <option value="Tunisia تونس">Tunisia تونس</option>
                          <option value="Turkey تركيا">Turkey تركيا</option>
                          <option value="Turkmenistan تركمانستان">Turkmenistan تركمانستان</option>
                          <option value="Tuvalu توفالو">Tuvalu توفالو</option>
                          <option value="Uganda أوغندا">Uganda أوغندا</option>
                          <option value="Ukraine أوكرانيا">Ukraine أوكرانيا</option>
                          <option value="United Arab Emirates الإمارات العربية المتحدة">United Arab Emirates الإمارات العربية المتحدة</option>
                          <option value="United Kingdom المملكة المتحدة">United Kingdom المملكة المتحدة</option>
                          <option value="United States الولايات المتحدة الأمريكية">United States الولايات المتحدة الأمريكية</option>
                          <option value="Uruguay أوروغواي">Uruguay أوروغواي</option>
                          <option value="Uzbekistan أوزبكستان">Uzbekistan أوزبكستان</option>
                          <option value="Vanuatu فانواتو">Vanuatu فانواتو</option>
                          <option value="Vatican City الفاتيكان">Vatican City الفاتيكان</option>
                          <option value="Venezuela فنزويلا">Venezuela فنزويلا</option>
                          <option value="Vietnam فيتنام">Vietnam فيتنام</option>
                          <option value="Yemen اليمن">Yemen اليمن</option>
                          <option value="Zambia زامبيا">Zambia زامبيا</option>
                          <option value="Zimbabwe زيمبابوي">Zimbabwe زيمبابوي</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Holder Date of Issue <span class="error">*</span></label>
                        <input type="date" name="holder_date_of_issue" id="holder-date-of-issue" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Gender <span class="error">*</span></label>
                        <select name="gender" id="gender" class="form-control select2">
                          <option value="">Select Gender</option>
                          <option value="male">Male ذكر</option>
                          <option value="female">Female أنثى</option>
                          <option value="other">Other أخرى</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Occupation in Arabic <span class="error">*</span></label>
                        <input type="text" name="occupation_arabic" id="occupation-arabic" class="form-control" placeholder="أدخل المهنة">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Occupation in English <span class="error">*</span></label>
                        <input type="text" name="occupation_english" id="occupation-english" class="form-control" placeholder="Enter Occupation">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Birth <span class="error">*</span></label>
                        <input type="date" name="date_of_birth" id="date-of-birth" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Passport No <span class="error">*</span></label>
                        <input type="text" name="passport_no" id="passport-no" class="form-control" placeholder="Enter Passport No">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Place of Issue <span class="error">*</span></label>
                        <input type="text" name="place_of_issue" id="place-of-issue" class="form-control" placeholder="Enter Place of Issue">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Passport Type <span class="error">*</span></label>
                        <select name="passport_type" id="passport-type" class="form-control">
                          <option value="">Select Password Type</option>
                          <option value="Diplomatic">Diplomatic دبلوماسي</option>
                          <option value="Official">Official رسمي</option>
                          <option value="Normal">Normal عادي<</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Expiry Date <span class="error">*</span></label>
                        <input type="date" name="holder_expiry_date" id="holder-expiry-date" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h2 style="text-align: center; width: 100%;">Employer/Family Breadwinner Details. ﺑﻴﺎﻧﺎت ﺻﺎﺣﺐ اﻟﻌﻤﻞ/اﻟﻌﺎﺋﻞ</h2>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Fullname of Company In Arabic <span class="error">*</span></label>
                        <input type="text" name="company_fullname_arabic" id="company-fullname-arabic" class="form-control" placeholder="Fullname of Company In Arabic">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>MOI Refrence: <span class="error">*</span></label>
                        <input type="text" name="moi_refrence_family" id="moi-refrence-family" class="form-control" placeholder="Enter MOI Refrence">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mobile No <span class="error">*</span></label>
                        <input type="text" name="mobile_no" id="mobile-no" class="form-control" placeholder="Enter Mobile No">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Message <span class="error">*</span></label>
                        <textarea name="message" id="message" class="form-control" placeholder="Enter Message"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>QR Link <span class="error">*</span></label>
                        <div class="d-flex">
                          <label style="margin-top: 6px; color: #495057;">{{ url('/verify/qrcode') }}/ </label> &nbsp; 
                          <input type="text" name="qr_link" id="qr-link" class="form-control" placeholder="Enter Link">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="qr-link"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-success" id="btn-save-visa">Save</button>
                <a class="btn btn-danger" href="{{ route('visa.index') }}">Back</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
@endsection
@section('scripts')
<script src="{{ url('/assets/js/visa.js') }}"></script>
@endsection
