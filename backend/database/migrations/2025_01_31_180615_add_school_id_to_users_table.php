<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('school_id')->nullable()->after('id'); // Add school_id column
        
        // Add foreign key constraint
        $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Drop the foreign key constraint and the school_id column
        $table->dropForeign(['school_id']);
        $table->dropColumn('school_id');
    });
}
};
