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
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id')->nullable()->after('status'); // Add region_id column
            $table->dropColumn('region'); // Remove old region column
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade'); // Set foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['region_id']); // Drop foreign key
            $table->dropColumn('region_id'); // Remove new column
            $table->string('region')->nullable(); // Add back old column
        });
        
    }
};
