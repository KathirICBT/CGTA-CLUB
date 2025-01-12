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
        Schema::table('events', function (Blueprint $table) {
            Schema::table('events', function (Blueprint $table) {
                // Remove the old eventCategory column
                $table->dropColumn('eventCategory');

                // Add event_category_id as a foreign key
                $table->unsignedBigInteger('event_category_id')->after('id'); // Adjust position as needed
                $table->foreign('event_category_id')
                    ->references('id')
                    ->on('event_categories')
                    ->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            Schema::table('events', function (Blueprint $table) {
                // Drop foreign key and column
                $table->dropForeign(['event_category_id']);
                $table->dropColumn('event_category_id');

                // Re-add the old eventCategory column
                $table->string('eventCategory')->nullable();
            });
        });
    }
};
