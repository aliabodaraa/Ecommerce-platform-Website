<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->string('title',400);
            $table->string('link');
            $table->integer('status');//->default(0);//Course is free or paid
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
        // 1 T Many
        // tracks courses
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
