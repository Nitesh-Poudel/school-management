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
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('t_address')->nullable()->after('dob'); // Addressp
            $table->string('p_address')->nullable()->after('t_address');
            $table->enum('role', ['super-admin', 'admin', 'user'])->default('user')->after('p_address'); // Role
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dob', 't_address','p_address', 'role']);
        });
    }
};
