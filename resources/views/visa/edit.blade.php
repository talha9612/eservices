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
                <form action="{{ route('visa.update', $data['visa']->id) }}" id="update-visa-form" enctype="multipart/form-data">
                  @method('PUT')
                  <div class="row">
                    <h2 style="text-align: center; width: 100%;">Details Visa. ﺑﻴﺎﻧﺎت اﻟﺘﺄﺷﻴﺮة</h2>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Visa Number: <span class="error">*</span></label>
                        <input type="number" name="visa_no" id="visa-no" class="form-control" placeholder="Enter Visa No" value="{{ $data['visa']->visa_no }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Type in Arabic <span class="error">*</span></label>
                        <input type="text" name="visa_type_arabic" id="visa-type-arabic" class="form-control" placeholder="ﻧﻮع اﻟﺘﺄﺷﻴﺮة" value="{{ $data['visa']->visa_type_arabic }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Type in English <span class="error">*</span></label>
                        <input type="text" name="visa_type_english" id="visa-type-english" class="form-control" placeholder="Enter Visa Type" value="{{ $data['visa']->visa_type_english }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Purpose in Arabic <span class="error">*</span></label>
                        <input type="text" name="visa_purpose_arabic" id="visa-purpose-arabic" class="form-control" placeholder="اﻟﻐﺮض" value="{{ $data['visa']->visa_purpose_arabic }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visa Purpose in English <span class="error">*</span></label>
                        <input type="text" name="visa_purpose_english" id="visa-purpose-english" class="form-control" placeholder="Enter Visa Type" value="{{ $data['visa']->visa_purpose_english }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Issuance <span class="error">*</span></label>
                        <input type="date" name="date_of_issue" id="date-of-issue" class="form-control" value="{{ $data['visa']->date_of_issue }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Expiry <span class="error">*</span></label>
                        <input type="date" name="date_of_expiry" id="date-of-expiry" class="form-control" value="{{ $data['visa']->date_of_expiry }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Place of Issue In Arabic <span class="error">*</span></label>
                        <input type="text" name="place_of_issue_arabic" id="place-of-issue-arabic" class="form-control" placeholder="Place Of Issue In Arabic ex: ادارة ﻋﻤﻞ ﻣﺤﺎﻓﻈﺔ اﻟﻔﺮواﻧﻴﺔ" value="{{ $data['visa']->place_of_issue_arabic }}">
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
                        <input type="text" name="fullname_arabic" id="fullname-arabic" class="form-control" placeholder="اﻻﺳﻢ اﻟﻜﺎﻣﻞ" value="{{ $data['visa']->fullname_arabic }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fullname in English <span class="error">*</span></label>
                        <input type="text" name="fullname_english" id="fullname-english" class="form-control" placeholder="Enter Fullname" value="{{ $data['visa']->fullname_english }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>MOI Reference: <span class="error">*</span></label>
                        <input type="text" name="moi_refrence" id="moi-refrence" class="form-control" placeholder="Enter MOI Refrence" value="{{ $data['visa']->moi_refrence }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nationality <span class="error">*</span></label>
                        <select name="nationality" id="nationality" class="form-control select2">
                          <option @selected($data['visa']->nationality == '">Select') value="">Select Nationality</option>
                          <option @selected($data['visa']->nationality == 'Afghanistan أفغانستان') value="Afghanistan أفغانستان">Afghanistan أفغانستان</option>
                          <option @selected($data['visa']->nationality == 'Albania ألبانيا') value="Albania ألبانيا">Albania ألبانيا</option>
                          <option @selected($data['visa']->nationality == 'Algeria الجزائر') value="Algeria الجزائر">Algeria الجزائر</option>
                          <option @selected($data['visa']->nationality == 'Andorra أندورا') value="Andorra أندورا">Andorra أندورا</option>
                          <option @selected($data['visa']->nationality == 'Angola أنغولا') value="Angola أنغولا">Angola أنغولا</option>
                          <option @selected($data['visa']->nationality == 'Antigua and') value="Antigua and Barbuda أنتيغوا وبربودا">Antigua and Barbuda أنتيغوا وبربودا</option>
                          <option @selected($data['visa']->nationality == 'Argentina الأرجنتين') value="Argentina الأرجنتين">Argentina الأرجنتين</option>
                          <option @selected($data['visa']->nationality == 'Armenia أرمينيا') value="Armenia أرمينيا">Armenia أرمينيا</option>
                          <option @selected($data['visa']->nationality == 'Australia أستراليا') value="Australia أستراليا">Australia أستراليا</option>
                          <option @selected($data['visa']->nationality == 'Austria النمسا') value="Austria النمسا">Austria النمسا</option>
                          <option @selected($data['visa']->nationality == 'Azerbaijan أذربيجان') value="Azerbaijan أذربيجان">Azerbaijan أذربيجان</option>
                          <option @selected($data['visa']->nationality == 'Bahamas الباهاما') value="Bahamas الباهاما">Bahamas الباهاما</option>
                          <option @selected($data['visa']->nationality == 'Bahrain البحرين') value="Bahrain البحرين">Bahrain البحرين</option>
                          <option @selected($data['visa']->nationality == 'Bangladesh بنغلاديش') value="Bangladesh بنغلاديش">Bangladesh بنغلاديش</option>
                          <option @selected($data['visa']->nationality == 'Barbados بربادوس') value="Barbados بربادوس">Barbados بربادوس</option>
                          <option @selected($data['visa']->nationality == 'Belarus روسيا') value="Belarus روسيا البيضاء">Belarus روسيا البيضاء</option>
                          <option @selected($data['visa']->nationality == 'Belgium بلجيكا') value="Belgium بلجيكا">Belgium بلجيكا</option>
                          <option @selected($data['visa']->nationality == 'Belize بليز') value="Belize بليز">Belize بليز</option>
                          <option @selected($data['visa']->nationality == 'Benin بنين') value="Benin بنين">Benin بنين</option>
                          <option @selected($data['visa']->nationality == 'Bhutan بوتان') value="Bhutan بوتان">Bhutan بوتان</option>
                          <option @selected($data['visa']->nationality == 'Bolivia بوليفيا') value="Bolivia بوليفيا">Bolivia بوليفيا</option>
                          <option @selected($data['visa']->nationality == 'Bosnia and') value="Bosnia and Herzegovina البوسنة والهرسك">Bosnia and Herzegovina البوسنة والهرسك</option>
                          <option @selected($data['visa']->nationality == 'Botswana بوتسوانا') value="Botswana بوتسوانا">Botswana بوتسوانا</option>
                          <option @selected($data['visa']->nationality == 'Brazil البرازيل') value="Brazil البرازيل">Brazil البرازيل</option>
                          <option @selected($data['visa']->nationality == 'Brunei بروناي') value="Brunei بروناي">Brunei بروناي</option>
                          <option @selected($data['visa']->nationality == 'Bulgaria بلغاريا') value="Bulgaria بلغاريا">Bulgaria بلغاريا</option>
                          <option @selected($data['visa']->nationality == 'Burkina Faso') value="Burkina Faso بوركينا فاسو">Burkina Faso بوركينا فاسو</option>
                          <option @selected($data['visa']->nationality == 'Burundi بوروندي') value="Burundi بوروندي">Burundi بوروندي</option>
                          <option @selected($data['visa']->nationality == 'Cabo Verde') value="Cabo Verde الرأس الأخضر">Cabo Verde الرأس الأخضر</option>
                          <option @selected($data['visa']->nationality == 'Cambodia كمبوديا') value="Cambodia كمبوديا">Cambodia كمبوديا</option>
                          <option @selected($data['visa']->nationality == 'Cameroon الكاميرون') value="Cameroon الكاميرون">Cameroon الكاميرون</option>
                          <option @selected($data['visa']->nationality == 'Canada كندا') value="Canada كندا">Canada كندا</option>
                          <option @selected($data['visa']->nationality == 'Central African') value="Central African Republic جمهورية أفريقيا الوسطى">Central African Republic جمهورية أفريقيا الوسطى</option>
                          <option @selected($data['visa']->nationality == 'Chad تشاد') value="Chad تشاد">Chad تشاد</option>
                          <option @selected($data['visa']->nationality == 'Chile شيلي') value="Chile شيلي">Chile شيلي</option>
                          <option @selected($data['visa']->nationality == 'China الصين') value="China الصين">China الصين</option>
                          <option @selected($data['visa']->nationality == 'Colombia كولومبيا') value="Colombia كولومبيا">Colombia كولومبيا</option>
                          <option @selected($data['visa']->nationality == 'Comoros جزر') value="Comoros جزر القمر">Comoros جزر القمر</option>
                          <option @selected($data['visa']->nationality == 'Congo الكونغو') value="Congo الكونغو">Congo الكونغو</option>
                          <option @selected($data['visa']->nationality == 'Costa Rica') value="Costa Rica كوستاريكا">Costa Rica كوستاريكا</option>
                          <option @selected($data['visa']->nationality == 'Croatia كرواتيا') value="Croatia كرواتيا">Croatia كرواتيا</option>
                          <option @selected($data['visa']->nationality == 'Cuba كوبا') value="Cuba كوبا">Cuba كوبا</option>
                          <option @selected($data['visa']->nationality == 'Cyprus قبرص') value="Cyprus قبرص">Cyprus قبرص</option>
                          <option @selected($data['visa']->nationality == 'Czechia التشيك') value="Czechia التشيك">Czechia التشيك</option>
                          <option @selected($data['visa']->nationality == 'Denmark الدنمارك') value="Denmark الدنمارك">Denmark الدنمارك</option>
                          <option @selected($data['visa']->nationality == 'Djibouti جيبوتي') value="Djibouti جيبوتي">Djibouti جيبوتي</option>
                          <option @selected($data['visa']->nationality == 'Dominica دومينيكا') value="Dominica دومينيكا">Dominica دومينيكا</option>
                          <option @selected($data['visa']->nationality == 'Dominican Republic') value="Dominican Republic جمهورية الدومينيكان">Dominican Republic جمهورية الدومينيكان</option>
                          <option @selected($data['visa']->nationality == 'East Timor') value="East Timor تيمور الشرقية">East Timor تيمور الشرقية</option>
                          <option @selected($data['visa']->nationality == 'Ecuador الإكوادور') value="Ecuador الإكوادور">Ecuador الإكوادور</option>
                          <option @selected($data['visa']->nationality == 'Egypt مصر') value="Egypt مصر">Egypt مصر</option>
                          <option @selected($data['visa']->nationality == 'El Salvador') value="El Salvador السلفادور">El Salvador السلفادور</option>
                          <option @selected($data['visa']->nationality == 'Equatorial Guinea') value="Equatorial Guinea غينيا الاستوائية">Equatorial Guinea غينيا الاستوائية</option>
                          <option @selected($data['visa']->nationality == 'Eritrea إريتريا') value="Eritrea إريتريا">Eritrea إريتريا</option>
                          <option @selected($data['visa']->nationality == 'Estonia استونيا') value="Estonia استونيا">Estonia استونيا</option>
                          <option @selected($data['visa']->nationality == 'Eswatini إسواتيني') value="Eswatini إسواتيني">Eswatini إسواتيني</option>
                          <option @selected($data['visa']->nationality == 'Ethiopia إثيوبيا') value="Ethiopia إثيوبيا">Ethiopia إثيوبيا</option>
                          <option @selected($data['visa']->nationality == 'Fiji فيجي') value="Fiji فيجي">Fiji فيجي</option>
                          <option @selected($data['visa']->nationality == 'Finland فنلندا') value="Finland فنلندا">Finland فنلندا</option>
                          <option @selected($data['visa']->nationality == 'France فرنسا') value="France فرنسا">France فرنسا</option>
                          <option @selected($data['visa']->nationality == 'Gabon الغابون') value="Gabon الغابون">Gabon الغابون</option>
                          <option @selected($data['visa']->nationality == 'Gambia غامبيا') value="Gambia غامبيا">Gambia غامبيا</option>
                          <option @selected($data['visa']->nationality == 'Georgia جورجيا') value="Georgia جورجيا">Georgia جورجيا</option>
                          <option @selected($data['visa']->nationality == 'Germany ألمانيا') value="Germany ألمانيا">Germany ألمانيا</option>
                          <option @selected($data['visa']->nationality == 'Ghana غانا') value="Ghana غانا">Ghana غانا</option>
                          <option @selected($data['visa']->nationality == 'Greece اليونان') value="Greece اليونان">Greece اليونان</option>
                          <option @selected($data['visa']->nationality == 'Grenada غرينادا') value="Grenada غرينادا">Grenada غرينادا</option>
                          <option @selected($data['visa']->nationality == 'Guatemala غواتيمالا') value="Guatemala غواتيمالا">Guatemala غواتيمالا</option>
                          <option @selected($data['visa']->nationality == 'Guinea غينيا') value="Guinea غينيا">Guinea غينيا</option>
                          <option @selected($data['visa']->nationality == 'Guinea-Bissau') value="Guinea-Bissau غينيا بيساو">Guinea-Bissau غينيا بيساو</option>
                          <option @selected($data['visa']->nationality == 'Guyana غيانا') value="Guyana غيانا">Guyana غيانا</option>
                          <option @selected($data['visa']->nationality == 'Haiti هايتي') value="Haiti هايتي">Haiti هايتي</option>
                          <option @selected($data['visa']->nationality == 'Honduras هندوراس') value="Honduras هندوراس">Honduras هندوراس</option>
                          <option @selected($data['visa']->nationality == 'Hungary المجر') value="Hungary المجر">Hungary المجر</option>
                          <option @selected($data['visa']->nationality == 'Iceland آيسلندا') value="Iceland آيسلندا">Iceland آيسلندا</option>
                          <option @selected($data['visa']->nationality == 'India الهند') value="India الهند">India الهند</option>
                          <option @selected($data['visa']->nationality == 'Indonesia إندونيسيا') value="Indonesia إندونيسيا">Indonesia إندونيسيا</option>
                          <option @selected($data['visa']->nationality == 'Iran إيران') value="Iran إيران">Iran إيران</option>
                          <option @selected($data['visa']->nationality == 'Iraq العراق') value="Iraq العراق">Iraq العراق</option>
                          <option @selected($data['visa']->nationality == 'Ireland أيرلندا') value="Ireland أيرلندا">Ireland أيرلندا</option>
                          <option @selected($data['visa']->nationality == 'Israel إسرائيل') value="Israel إسرائيل">Israel إسرائيل</option>
                          <option @selected($data['visa']->nationality == 'Italy إيطاليا') value="Italy إيطاليا">Italy إيطاليا</option>
                          <option @selected($data['visa']->nationality == 'Jamaica جامايكا') value="Jamaica جامايكا">Jamaica جامايكا</option>
                          <option @selected($data['visa']->nationality == 'Japan اليابان') value="Japan اليابان">Japan اليابان</option>
                          <option @selected($data['visa']->nationality == 'Jordan الأردن') value="Jordan الأردن">Jordan الأردن</option>
                          <option @selected($data['visa']->nationality == 'Kazakhstan كازاخستان') value="Kazakhstan كازاخستان">Kazakhstan كازاخستان</option>
                          <option @selected($data['visa']->nationality == 'Kenya كينيا') value="Kenya كينيا">Kenya كينيا</option>
                          <option @selected($data['visa']->nationality == 'Kiribati كيريباتي') value="Kiribati كيريباتي">Kiribati كيريباتي</option>
                          <option @selected($data['visa']->nationality == 'Korea,') value="Korea, North كوريا الشمالية">Korea, North كوريا الشمالية</option>
                          <option @selected($data['visa']->nationality == 'Korea,') value="Korea, South كوريا الجنوبية">Korea, South كوريا الجنوبية</option>
                          <option @selected($data['visa']->nationality == 'Kosovo كوسوفو') value="Kosovo كوسوفو">Kosovo كوسوفو</option>
                          <option @selected($data['visa']->nationality == 'Kuwait الكويت') value="Kuwait الكويت">Kuwait الكويت</option>
                          <option @selected($data['visa']->nationality == 'Kyrgyzstan قيرغيزستان') value="Kyrgyzstan قيرغيزستان">Kyrgyzstan قيرغيزستان</option>
                          <option @selected($data['visa']->nationality == 'Laos لاوس') value="Laos لاوس">Laos لاوس</option>
                          <option @selected($data['visa']->nationality == 'Latvia لاتفيا') value="Latvia لاتفيا">Latvia لاتفيا</option>
                          <option @selected($data['visa']->nationality == 'Lebanon لبنان') value="Lebanon لبنان">Lebanon لبنان</option>
                          <option @selected($data['visa']->nationality == 'Lesotho ليسوتو') value="Lesotho ليسوتو">Lesotho ليسوتو</option>
                          <option @selected($data['visa']->nationality == 'Liberia ليبيريا') value="Liberia ليبيريا">Liberia ليبيريا</option>
                          <option @selected($data['visa']->nationality == 'Libya ليبيا') value="Libya ليبيا">Libya ليبيا</option>
                          <option @selected($data['visa']->nationality == 'Liechtenstein ليختنشتاين') value="Liechtenstein ليختنشتاين">Liechtenstein ليختنشتاين</option>
                          <option @selected($data['visa']->nationality == 'Lithuania ليتوانيا') value="Lithuania ليتوانيا">Lithuania ليتوانيا</option>
                          <option @selected($data['visa']->nationality == 'Luxembourg لوكسمبورغ') value="Luxembourg لوكسمبورغ">Luxembourg لوكسمبورغ</option>
                          <option @selected($data['visa']->nationality == 'Madagascar مدغشقر') value="Madagascar مدغشقر">Madagascar مدغشقر</option>
                          <option @selected($data['visa']->nationality == 'Malawi ملاوي') value="Malawi ملاوي">Malawi ملاوي</option>
                          <option @selected($data['visa']->nationality == 'Malaysia ماليزيا') value="Malaysia ماليزيا">Malaysia ماليزيا</option>
                          <option @selected($data['visa']->nationality == 'Maldives المالديف') value="Maldives المالديف">Maldives المالديف</option>
                          <option @selected($data['visa']->nationality == 'Mali مالي') value="Mali مالي">Mali مالي</option>
                          <option @selected($data['visa']->nationality == 'Malta مالطا') value="Malta مالطا">Malta مالطا</option>
                          <option @selected($data['visa']->nationality == 'Marshall Islands') value="Marshall Islands جزر مارشال">Marshall Islands جزر مارشال</option>
                          <option @selected($data['visa']->nationality == 'Mauritania موريتانيا') value="Mauritania موريتانيا">Mauritania موريتانيا</option>
                          <option @selected($data['visa']->nationality == 'Mauritius موريشيوس') value="Mauritius موريشيوس">Mauritius موريشيوس</option>
                          <option @selected($data['visa']->nationality == 'Mexico المكسيك') value="Mexico المكسيك">Mexico المكسيك</option>
                          <option @selected($data['visa']->nationality == 'Micronesia ميكرونيزيا') value="Micronesia ميكرونيزيا">Micronesia ميكرونيزيا</option>
                          <option @selected($data['visa']->nationality == 'Moldova مولدوفا') value="Moldova مولدوفا">Moldova مولدوفا</option>
                          <option @selected($data['visa']->nationality == 'Monaco موناكو') value="Monaco موناكو">Monaco موناكو</option>
                          <option @selected($data['visa']->nationality == 'Mongolia منغوليا') value="Mongolia منغوليا">Mongolia منغوليا</option>
                          <option @selected($data['visa']->nationality == 'Montenegro الجبل') value="Montenegro الجبل الأسود">Montenegro الجبل الأسود</option>
                          <option @selected($data['visa']->nationality == 'Morocco المغرب') value="Morocco المغرب">Morocco المغرب</option>
                          <option @selected($data['visa']->nationality == 'Mozambique موزمبيق') value="Mozambique موزمبيق">Mozambique موزمبيق</option>
                          <option @selected($data['visa']->nationality == 'Myanmar ميانمار') value="Myanmar ميانمار">Myanmar ميانمار</option>
                          <option @selected($data['visa']->nationality == 'Namibia ناميبيا') value="Namibia ناميبيا">Namibia ناميبيا</option>
                          <option @selected($data['visa']->nationality == 'Nauru ناورو') value="Nauru ناورو">Nauru ناورو</option>
                          <option @selected($data['visa']->nationality == 'Nepal نيبال') value="Nepal نيبال">Nepal نيبال</option>
                          <option @selected($data['visa']->nationality == 'Netherlands هولندا') value="Netherlands هولندا">Netherlands هولندا</option>
                          <option @selected($data['visa']->nationality == 'New Zealand') value="New Zealand نيوزيلندا">New Zealand نيوزيلندا</option>
                          <option @selected($data['visa']->nationality == 'Nicaragua نيكاراغوا') value="Nicaragua نيكاراغوا">Nicaragua نيكاراغوا</option>
                          <option @selected($data['visa']->nationality == 'Niger النيجر') value="Niger النيجر">Niger النيجر</option>
                          <option @selected($data['visa']->nationality == 'Nigeria نيجيريا') value="Nigeria نيجيريا">Nigeria نيجيريا</option>
                          <option @selected($data['visa']->nationality == 'North Macedonia') value="North Macedonia مقدونيا الشمالية">North Macedonia مقدونيا الشمالية</option>
                          <option @selected($data['visa']->nationality == 'Norway النرويج') value="Norway النرويج">Norway النرويج</option>
                          <option @selected($data['visa']->nationality == 'Oman عمان') value="Oman عمان">Oman عمان</option>
                          <option @selected($data['visa']->nationality == 'Pakistan باكستان') value="Pakistan باكستان">Pakistan باكستان</option>
                          <option @selected($data['visa']->nationality == 'Palau بالاو') value="Palau بالاو">Palau بالاو</option>
                          <option @selected($data['visa']->nationality == 'Palestine فلسطين') value="Palestine فلسطين">Palestine فلسطين</option>
                          <option @selected($data['visa']->nationality == 'Panama بنما') value="Panama بنما">Panama بنما</option>
                          <option @selected($data['visa']->nationality == 'Papua New') value="Papua New Guinea بابوا غينيا الجديدة">Papua New Guinea بابوا غينيا الجديدة</option>
                          <option @selected($data['visa']->nationality == 'Paraguay باراغواي') value="Paraguay باراغواي">Paraguay باراغواي</option>
                          <option @selected($data['visa']->nationality == 'Peru بيرو') value="Peru بيرو">Peru بيرو</option>
                          <option @selected($data['visa']->nationality == 'Philippines الفلبين') value="Philippines الفلبين">Philippines الفلبين</option>
                          <option @selected($data['visa']->nationality == 'Poland بولندا') value="Poland بولندا">Poland بولندا</option>
                          <option @selected($data['visa']->nationality == 'Portugal البرتغال') value="Portugal البرتغال">Portugal البرتغال</option>
                          <option @selected($data['visa']->nationality == 'Qatar قطر') value="Qatar قطر">Qatar قطر</option>
                          <option @selected($data['visa']->nationality == 'Romania رومانيا') value="Romania رومانيا">Romania رومانيا</option>
                          <option @selected($data['visa']->nationality == 'Russia روسيا') value="Russia روسيا">Russia روسيا</option>
                          <option @selected($data['visa']->nationality == 'Rwanda رواندا') value="Rwanda رواندا">Rwanda رواندا</option>
                          <option @selected($data['visa']->nationality == 'Saint Kitts') value="Saint Kitts and Nevis سانت كيتس ونيفيس">Saint Kitts and Nevis سانت كيتس ونيفيس</option>
                          <option @selected($data['visa']->nationality == 'Saint Lucia') value="Saint Lucia سانت لوسيا">Saint Lucia سانت لوسيا</option>
                          <option @selected($data['visa']->nationality == 'Saint Vincent') value="Saint Vincent and the Grenadines سانت فنسنت والغرينادين">Saint Vincent and the Grenadines سانت فنسنت والغرينادين</option>
                          <option @selected($data['visa']->nationality == 'Samoa ساموا') value="Samoa ساموا">Samoa ساموا</option>
                          <option @selected($data['visa']->nationality == 'San Marino') value="San Marino سان مارينو">San Marino سان مارينو</option>
                          <option @selected($data['visa']->nationality == 'Sao Tome') value="Sao Tome and Principe ساو تومي وبرينسيبي">Sao Tome and Principe ساو تومي وبرينسيبي</option>
                          <option @selected($data['visa']->nationality == 'Saudi Arabia') value="Saudi Arabia المملكة العربية السعودية">Saudi Arabia المملكة العربية السعودية</option>
                          <option @selected($data['visa']->nationality == 'Senegal السنغال') value="Senegal السنغال">Senegal السنغال</option>
                          <option @selected($data['visa']->nationality == 'Serbia صربيا') value="Serbia صربيا">Serbia صربيا</option>
                          <option @selected($data['visa']->nationality == 'Seychelles سيشيل') value="Seychelles سيشيل">Seychelles سيشيل</option>
                          <option @selected($data['visa']->nationality == 'Sierra Leone') value="Sierra Leone سيراليون">Sierra Leone سيراليون</option>
                          <option @selected($data['visa']->nationality == 'Singapore سنغافورة') value="Singapore سنغافورة">Singapore سنغافورة</option>
                          <option @selected($data['visa']->nationality == 'Slovakia سلوفاكيا') value="Slovakia سلوفاكيا">Slovakia سلوفاكيا</option>
                          <option @selected($data['visa']->nationality == 'Slovenia سلوفينيا') value="Slovenia سلوفينيا">Slovenia سلوفينيا</option>
                          <option @selected($data['visa']->nationality == 'Solomon Islands') value="Solomon Islands جزر سليمان">Solomon Islands جزر سليمان</option>
                          <option @selected($data['visa']->nationality == 'Somalia الصومال') value="Somalia الصومال">Somalia الصومال</option>
                          <option @selected($data['visa']->nationality == 'South Africa') value="South Africa جنوب أفريقيا">South Africa جنوب أفريقيا</option>
                          <option @selected($data['visa']->nationality == 'South Sudan') value="South Sudan جنوب السودان">South Sudan جنوب السودان</option>
                          <option @selected($data['visa']->nationality == 'Spain إسبانيا') value="Spain إسبانيا">Spain إسبانيا</option>
                          <option @selected($data['visa']->nationality == 'Sri Lanka') value="Sri Lanka سريلانكا">Sri Lanka سريلانكا</option>
                          <option @selected($data['visa']->nationality == 'Sudan السودان') value="Sudan السودان">Sudan السودان</option>
                          <option @selected($data['visa']->nationality == 'Suriname سورينام') value="Suriname سورينام">Suriname سورينام</option>
                          <option @selected($data['visa']->nationality == 'Sweden السويد') value="Sweden السويد">Sweden السويد</option>
                          <option @selected($data['visa']->nationality == 'Switzerland سويسرا') value="Switzerland سويسرا">Switzerland سويسرا</option>
                          <option @selected($data['visa']->nationality == 'Syria سوريا') value="Syria سوريا">Syria سوريا</option>
                          <option @selected($data['visa']->nationality == 'Taiwan تايوان') value="Taiwan تايوان">Taiwan تايوان</option>
                          <option @selected($data['visa']->nationality == 'Tajikistan طاجيكستان') value="Tajikistan طاجيكستان">Tajikistan طاجيكستان</option>
                          <option @selected($data['visa']->nationality == 'Tanzania تنزانيا') value="Tanzania تنزانيا">Tanzania تنزانيا</option>
                          <option @selected($data['visa']->nationality == 'Thailand تايلاند') value="Thailand تايلاند">Thailand تايلاند</option>
                          <option @selected($data['visa']->nationality == 'Togo توغو') value="Togo توغو">Togo توغو</option>
                          <option @selected($data['visa']->nationality == 'Tonga تونغا') value="Tonga تونغا">Tonga تونغا</option>
                          <option @selected($data['visa']->nationality == 'Trinidad and') value="Trinidad and Tobago ترينيداد وتوباغو">Trinidad and Tobago ترينيداد وتوباغو</option>
                          <option @selected($data['visa']->nationality == 'Tunisia تونس') value="Tunisia تونس">Tunisia تونس</option>
                          <option @selected($data['visa']->nationality == 'Turkey تركيا') value="Turkey تركيا">Turkey تركيا</option>
                          <option @selected($data['visa']->nationality == 'Turkmenistan تركمانستان') value="Turkmenistan تركمانستان">Turkmenistan تركمانستان</option>
                          <option @selected($data['visa']->nationality == 'Tuvalu توفالو') value="Tuvalu توفالو">Tuvalu توفالو</option>
                          <option @selected($data['visa']->nationality == 'Uganda أوغندا') value="Uganda أوغندا">Uganda أوغندا</option>
                          <option @selected($data['visa']->nationality == 'Ukraine أوكرانيا') value="Ukraine أوكرانيا">Ukraine أوكرانيا</option>
                          <option @selected($data['visa']->nationality == 'United Arab') value="United Arab Emirates الإمارات العربية المتحدة">United Arab Emirates الإمارات العربية المتحدة</option>
                          <option @selected($data['visa']->nationality == 'United Kingdom') value="United Kingdom المملكة المتحدة">United Kingdom المملكة المتحدة</option>
                          <option @selected($data['visa']->nationality == 'United States') value="United States الولايات المتحدة الأمريكية">United States الولايات المتحدة الأمريكية</option>
                          <option @selected($data['visa']->nationality == 'Uruguay أوروغواي') value="Uruguay أوروغواي">Uruguay أوروغواي</option>
                          <option @selected($data['visa']->nationality == 'Uzbekistan أوزبكستان') value="Uzbekistan أوزبكستان">Uzbekistan أوزبكستان</option>
                          <option @selected($data['visa']->nationality == 'Vanuatu فانواتو') value="Vanuatu فانواتو">Vanuatu فانواتو</option>
                          <option @selected($data['visa']->nationality == 'Vatican City') value="Vatican City الفاتيكان">Vatican City الفاتيكان</option>
                          <option @selected($data['visa']->nationality == 'Venezuela فنزويلا') value="Venezuela فنزويلا">Venezuela فنزويلا</option>
                          <option @selected($data['visa']->nationality == 'Vietnam فيتنام') value="Vietnam فيتنام">Vietnam فيتنام</option>
                          <option @selected($data['visa']->nationality == 'Yemen اليمن') value="Yemen اليمن">Yemen اليمن</option>
                          <option @selected($data['visa']->nationality == 'Zambia زامبيا') value="Zambia زامبيا">Zambia زامبيا</option>
                          <option @selected($data['visa']->nationality == 'Zimbabwe زيمبابوي') value="Zimbabwe زيمبابوي">Zimbabwe زيمبابوي</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Holder Date of Issue <span class="error">*</span></label>
                        <input type="date" name="holder_date_of_issue" id="holder-date-of-issue" class="form-control" value="{{ $data['visa']->holder_date_of_issue }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Gender <span class="error">*</span></label>
                        <select name="gender" id="gender" class="form-control select2">
                          <option value="">Select Gender</option>
                          <option @selected($data['visa']->gender == 'male') value="male">Male ذكر</option>
                          <option @selected($data['visa']->gender == 'female') value="female">Female أنثى</option>
                          <option @selected($data['visa']->gender == 'other') value="other">Other أخرى</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Occupation in Arabic <span class="error">*</span></label>
                        <input type="text" name="occupation_arabic" id="occupation-arabic" class="form-control" placeholder="أدخل المهنة" value="{{ $data['visa']->occupation_arabic }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Occupation in English <span class="error">*</span></label>
                        <input type="text" name="occupation_english" id="occupation-english" class="form-control" placeholder="Enter Occupation" value="{{ $data['visa']->occupation_english }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Birth <span class="error">*</span></label>
                        <input type="date" name="date_of_birth" id="date-of-birth" class="form-control" value="{{ $data['visa']->date_of_birth }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Passport No <span class="error">*</span></label>
                        <input type="text" name="passport_no" id="passport-no" class="form-control" placeholder="Enter Passport No" value="{{ $data['visa']->passport_no }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Place of Issue <span class="error">*</span></label>
                        <input type="text" name="place_of_issue" id="place-of-issue" class="form-control" placeholder="Enter Place of Issue" value="{{ $data['visa']->place_of_issue }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Passport Type <span class="error">*</span></label>
                        <select name="passport_type" id="passport-type" class="form-control">
                          <option value="">Select Password Type</option>
                          <option @selected($data['visa']->passport_type == 'Diplomatic') value="Diplomatic">Diplomatic دبلوماسي</option>
                          <option @selected($data['visa']->passport_type == 'Official') value="Official">Official رسمي</option>
                          <option @selected($data['visa']->passport_type == 'Normal') value="Normal">Normal عادي<</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Expiry Date <span class="error">*</span></label>
                        <input type="date" name="holder_expiry_date" id="holder-expiry-date" class="form-control" value="{{ $data['visa']->holder_expiry_date }}">
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
                        <input type="text" name="company_fullname_arabic" id="company-fullname-arabic" class="form-control" placeholder="Fullname of Company In Arabic" value="{{ $data['visa']->company_fullname_arabic }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>MOI Refrence: <span class="error">*</span></label>
                        <input type="text" name="moi_refrence_family" id="moi-refrence-family" class="form-control" placeholder="Enter MOI Refrence" value="{{ $data['visa']->moi_refrence_family }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mobile No <span class="error">*</span></label>
                        <input type="text" name="mobile_no" id="mobile-no" class="form-control" placeholder="Enter Mobile No" value="{{ $data['visa']->mobile_no }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Message <span class="error">*</span></label>
                        <textarea name="message" id="message" class="form-control" placeholder="Enter Message">{{ $data['visa']->message }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>QR Link <span class="error">*</span></label>
                        <div class="d-flex">
                          <label style="margin-top: 6px; color: #495057;">{{ url('/verify/qrcode') }}/ </label> &nbsp; 
                          <input type="text" name="qr_link" id="qr-link" class="form-control" placeholder="Enter Link" value="{{ urldecode($data['visa']->qr_link) }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="qr-link"><a href="#">{{ url('/verify/qrcode/' . $data['visa']->qr_link) }}</a></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-success" id="btn-update-visa">Update</button>
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
