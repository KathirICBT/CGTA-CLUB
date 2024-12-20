<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Temporarily change the column to VARCHAR
        Schema::table('events', function (Blueprint $table) {
            $table->string('visibility', 50)->change();
        });

        // Replace existing visibility values
        DB::table('events')
            ->where('visibility', 'public')
            ->update(['visibility' => 'allUsers']);

        DB::table('events')
            ->where('visibility', 'members_only')
            ->update(['visibility' => 'members']);

        // Update the enum definition
        Schema::table('events', function (Blueprint $table) {
            $table->enum('visibility', ['members', 'allUsers'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert enum definition back to old values
        Schema::table('events', function (Blueprint $table) {
            $table->string('visibility', 50)->change();
        });

        DB::table('events')
            ->where('visibility', 'allUsers')
            ->update(['visibility' => 'public']);

        DB::table('events')
            ->where('visibility', 'members')
            ->update(['visibility' => 'members_only']);

        Schema::table('events', function (Blueprint $table) {
            $table->enum('visibility', ['public', 'members_only'])->change();
        });
    }
};
