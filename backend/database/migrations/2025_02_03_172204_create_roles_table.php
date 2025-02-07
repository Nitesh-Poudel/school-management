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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // References users table
            $table->foreignId('school_id')->nullable()->constrained('schools')->onDelete('cascade'); // References schools table
            $table->enum('role', ['administrator', 'teacher', 'parent', 'student','accountant','librarian','exam-department','hr_manager','di','it-support','sports','transport']); // Restricted role values
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
