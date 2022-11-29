<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('artist');
            $table->text('album');
            $table->string('song_text');
            $table->text('song_text_dutch');
            $table->string('cover_art')->nullable();
            $table->text('path_0');
            $table->text('path_1');
            $table->text('path_2');
            $table->text('path_3');
            $table->text('path_4');
            $table->text('path_5');
            $table->boolean('active');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }  //
}
