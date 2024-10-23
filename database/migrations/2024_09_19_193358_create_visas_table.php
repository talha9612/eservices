<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_no');
            $table->string('visa_type_arabic');
            $table->string('visa_type_english');
            $table->string('visa_purpose_arabic');
            $table->string('visa_purpose_english');
            $table->date('date_of_issue');
            $table->date('date_of_expiry');
            $table->string('place_of_issue_arabic');
            $table->string('fullname_arabic');
            $table->string('fullname_english');
            $table->string('moi_refrence');
            $table->string('nationality');
            $table->date('holder_date_of_issue');
            $table->enum('gender', [ 'male', 'female', 'other' ]);
            $table->string('occupation_arabic');
            $table->string('occupation_english');
            $table->date('date_of_birth');
            $table->string('passport_no');
            $table->string('place_of_issue');
            $table->string('passport_type');
            $table->date('holder_expiry_date');
            $table->string('company_fullname_arabic');
            $table->string('moi_refrence_family');
            $table->string('mobile_no');
            $table->text('message')->nullable();
            $table->string('qr_link');
            $table->boolean('is_active')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
