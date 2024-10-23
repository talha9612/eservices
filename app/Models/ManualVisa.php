<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualVisa extends Model
{
    use HasFactory;

    protected $table = 'manual_visas';
    protected $fillable = [ 'passport_no', 'nationality', 'date_of_birth', 'file', 'is_active' ];
    protected $guarded = [ 'id', 'created_at', 'updated_at' ];
}
