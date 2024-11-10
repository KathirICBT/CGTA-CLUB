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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('memberId'); // Foreign key to Member (assuming you have a members table)
            $table->unsignedBigInteger('NotificationTemplateId'); // Foreign key to NotificationTemplate
            $table->json('TemplateData'); // JSON data for dynamic content
            $table->boolean('is_read')->default(false); // Notification read status
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('read_at')->nullable();

            // Foreign key constraints
            $table->foreign('NotificationTemplateId')->references('id')->on('notification_templates')->onDelete('cascade');
            // Assuming you have a "members" table
            $table->foreign('memberId')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
