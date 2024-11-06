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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members');
            $table->foreignId('package_id')->constrained('packages');
            $table->string('companyName');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('address');
            $table->date('joinDate');
            $table->text('services');
            $table->text('bio');
            $table->string('logoImg')->nullable();
            $table->string('status');
            $table->string('region');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
