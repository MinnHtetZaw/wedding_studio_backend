<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('price');
            $table->string('dress_id');
            $table->string('theme_id');
            $table->integer('no_of_dress')->default(0);
            $table->integer('no_of_theme')->default(0);
            $table->integer('no_of_retouched_photo')->default(0);
            $table->integer('no_of_normal_photo')->default(0);
            $table->string('main_frame_size');
            $table->enum('status',[0,1,2,3])->default(0);
            $table->boolean('is_discount')->default(false);
            $table->integer('discount_val')->default(0);
            $table->boolean('is_promotion')->default(false);
            $table->integer('promotion_val')->default(0);
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
