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
            $table->text('path');
            $table->text('path_instrumental');
            $table->text('path_contralto');
            $table->text('path_soprano');
            $table->text('path_tenor');
            $table->text('path_bass');
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
        Schema::dropIfExists('events');
    }  //
}
