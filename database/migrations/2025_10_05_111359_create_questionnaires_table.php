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

            $table->integer('height')->nullable();
            $table->integer('partner_height')->nullable();
            $table->string('religion')->nullable();
            $table->string('partner_religion')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('partner_ethnicity')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('partner_marital_status')->nullable();
            $table->string('education')->nullable();
            $table->string('partner_education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->string('income')->nullable();
            $table->string('partner_income')->nullable();
            $table->string('personality')->nullable();
            $table->string('partner_personality')->nullable();
            $table->string('last_school')->nullable();
            $table->string('company')->nullable();
            $table->string('job_position')->nullable();
            $table->string('social_media')->nullable();
            $table->text('description')->nullable();
            $table->text('partner_description')->nullable();
            $table->string('partner_priority')->nullable();
            $table->string('business_card')->nullable();
            $table->string('referral_code')->nullable();

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
