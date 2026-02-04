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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('conversation_id')->nullable(); // Group messages by conversation
            $table->string('name'); // Tên khách hàng
            $table->string('email')->nullable(); // Email khách hàng
            $table->text('message'); // Nội dung tin nhắn
            $table->enum('sender_type', ['user', 'admin', 'bot'])->default('user'); // Loại người gửi
            $table->enum('status', ['pending', 'answered', 'closed'])->default('pending'); // Trạng thái
            $table->boolean('is_automated')->default(false); // Có phải trả lời tự động không
            $table->timestamps();
            $table->index('conversation_id');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
