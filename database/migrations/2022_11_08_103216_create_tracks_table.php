<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('artist');
            $table->text('album');
            $table->boolean('public');
            $table->text('path_song_text')->nullable();
            $table->text('path_song_text_dutch')->nullable();
            $table->text('path_cover_art')->nullable();
            $table->text('path_sheets')->nullable();
            $table->text('path_directions')->nullable();
            $table->text('path')->nullable();
            $table->text('path_instrumental')->nullable();
            $table->text('path_soprano')->nullable();
            $table->text('path_contralto')->nullable();
            $table->text('path_tenor')->nullable();
            $table->text('path_bass')->nullable();
//            $table->boolean('active')->nullable();
            $table->timestamps();
//            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
