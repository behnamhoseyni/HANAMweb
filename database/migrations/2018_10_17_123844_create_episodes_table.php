<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title');
            $table->string('type',10);
            $table->string('slug');
            $table->string('description');
            $table->text('body');
            $table->string('time',15)->default('00:00:00');
            $table->string('videoUrl');
            $table->string('tags');
            $table->integer('viewCount')->default(0);
            $table->integer('number');
            $table->integer('CommentCount')->default(0);
            $table->integer('DownloadCount')->default(0);
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
        Schema::dropIfExists('episodes');
    }
}
