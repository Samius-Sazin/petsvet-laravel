<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qna_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('qna_categories')->onDelete('cascade');
            $table->string('title', 255);
            $table->text('body');
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->integer('answer_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qna_questions');
    }
};
