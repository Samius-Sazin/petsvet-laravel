<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('qna_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120)->unique();
            $table->timestamps();
        });

        
        DB::table('qna_categories')->insert([
            ['name' => 'Dog', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rabbit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bird', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('qna_categories');
    }
};