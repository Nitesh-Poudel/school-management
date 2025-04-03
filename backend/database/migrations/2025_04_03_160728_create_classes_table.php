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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->onDelete('cascade'); 
            $table->string('class_name'); // Predefined: Nursery, LKG, UKG, 1-10
            $table->string('section')->nullable(); // Nullable: If no sections, this can be NULL
            $table->foreignId('class_teacher_id')->nullable()->constrained('teachers')->onDelete('set null'); // Assign Class Teacher
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
