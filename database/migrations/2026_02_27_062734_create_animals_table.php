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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->integer("shelter_id");
            $table->string("name")->nullable();
            $table->string("gender");
            $table->integer("years")->nullable();
            $table->string("animal_type")->nullable();
            $table->string("activity_level")->nullable();
            $table->string("social_level")->nullable();
            $table->string("life_style")->nullable();
            $table->string("sleep_type")->nullable();
            $table->string("temperament")->nullable();
            $table->string("adventure_level")->nullable();
            $table->string("image_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
