<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButterfliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butterflies', function (Blueprint $table) {
            $table->id();
            $table->string('species', 1000);
            $table->string('local_name', 1000);
            $table->boolean('is_rare');
            $table->boolean('is_threatened');
            $table->boolean('is_vulnerable');
            $table->string('input_code');
            $table->integer('wing_span');
            $table->string('male_img_url', 1000);
            $table->string('female_img_url', 1000);
            $table->string('caterpillar_img_url', 1000);
            $table->string('pupa_img_url', 1000);
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
        Schema::dropIfExists('butterflies');
    }
}
