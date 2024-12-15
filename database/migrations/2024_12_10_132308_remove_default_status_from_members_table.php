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
        Schema::table('members', function (Blueprint $table) {
            Schema::table('members', function (Blueprint $table) {
                // Remove the default value for the status column
                $table->string('status')->default(null)->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            Schema::table('members', function (Blueprint $table) {
                // Re-add the default value if necessary during rollback
                $table->string('status')->default('waiting')->change();
            });
        });
    }
};
