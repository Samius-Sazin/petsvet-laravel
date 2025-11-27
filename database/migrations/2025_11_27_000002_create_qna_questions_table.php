<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('qna_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('qna_categories')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('title', 255);
            $table->longText('body');
            $table->integer('upvotes')->default(0);
            $table->integer('answer_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qna_questions');
    }
};