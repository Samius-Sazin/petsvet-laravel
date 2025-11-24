<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qna_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        DB::table('qna_categories')->insert([
            ['name' => 'Dog'],
            ['name' => 'Cat'],
            ['name' => 'Rabbit'],
            ['name' => 'Other'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('qna_categories');
    }
};
