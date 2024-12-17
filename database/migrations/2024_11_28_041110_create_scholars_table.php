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
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('email')->unique();
            $table->string('contact');
            $table->text('address');
            $table->string('school');
            $table->string('course');
            $table->foreignId('year_level_id')->constrained('year_levels')->onDelete('cascade');
            $table->string('cor_file'); // Certificate of Registration
            $table->string('cog_file'); // Certificate of Good Standing
            $table->string('school_id'); // Student ID (image file)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars');
    }
};
