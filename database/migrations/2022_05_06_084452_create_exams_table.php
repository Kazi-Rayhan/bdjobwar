<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->bigInteger('price');
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->integer('duration');
            $table->tinyInteger('point', false, true)->default(1);
            $table->integer('minimum_to_pass', false, true)->default(33);
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
        Schema::dropIfExists('exams');
    }
}
