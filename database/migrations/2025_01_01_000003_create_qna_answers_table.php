<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qna_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('qna_questions')->onDelete('cascade');
            $table->string('guest_name')->nullable();
            $table->text('body');
            $table->integer('recommended_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qna_answers');
    }
};
