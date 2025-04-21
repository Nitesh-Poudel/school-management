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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('user_id'); // references users table
            $table->unsignedBigInteger('class_id'); // references classes table
            $table->string('roll_number');//unique per school
            $table->date('dob');
            $table->enum('gender', ['male', 'female','others']);
            $table->string('guardian_name');
            $table->string('emergency_contact')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->unique(['class_id', 'roll_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
