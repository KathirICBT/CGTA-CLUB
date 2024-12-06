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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->string('timezone')->default('UTC');
            $table->enum('visibility', ['public', 'members_only'])->default('public');
            $table->enum('paid_free', ['paid', 'free'])->default('free');
            $table->date('release_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->string('event_url')->nullable();
            $table->string('location')->nullable();
            $table->integer('user_limit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
