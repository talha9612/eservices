<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActiveScopeTrait;

class Visa extends Model
{
    use HasFactory, ActiveScopeTrait;

    protected $table = 'visas';
    protected $fillable = [
	    'visa_no',
	    'visa_type_arabic',
	    'visa_type_english',
	    'visa_purpose_arabic',
	    'visa_purpose_english',
	    'date_of_issue',
	    'date_of_expiry',
	    'place_of_issue_arabic',
	    'fullname_arabic',
	    'fullname_english',
	    'moi_refrence',
	    'nationality',
	    'holder_date_of_issue',
	    'gender',
	    'occupation_arabic',
	    'occupation_english',
	    'date_of_birth',
	    'passport_no',
	    'place_of_issue',
	    'passport_type',
	    'holder_expiry_date',
	    'company_fullname_arabic',
	    'moi_refrence_family',
	    'mobile_no',
	    'message',
	    'qr_link',
	    'is_active'
	];
    protected $guarded = [ 'id', 'created_at', 'updated_at' ];
}
