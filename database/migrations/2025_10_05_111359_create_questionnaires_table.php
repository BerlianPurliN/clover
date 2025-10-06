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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();

            // Kolom untuk menghubungkan ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Information
            $table->string('name');
            $table->string('mobile_phone');
            $table->string('email');
            $table->string('gender');
            $table->date('dob');
            $table->integer('height')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('current_city')->nullable();
            $table->string('marital_status')->nullable();

            // Work Information
            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('income')->nullable();
            $table->string('business_card_path')->nullable();

            // Education
            $table->string('education')->nullable();
            $table->string('school_name')->nullable();
            $table->string('major')->nullable();

            // About & Preferences
            $table->string('recent_photos_path')->nullable();
            $table->text('partner_preferences')->nullable();
            $table->string('social_media')->nullable();
            $table->text('about_self')->nullable();
            $table->text('about_partner')->nullable();
            $table->string('referrer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
