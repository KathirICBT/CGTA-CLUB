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
        Schema::dropIfExists('member_notification'); // Drops the member_notification table
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // If needed, you could re-create the table here. 
        Schema::create('member_notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('notification_id');
            $table->timestamp('read_at')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
            $table->unique(['member_id', 'notification_id']);
        });
    }
};
