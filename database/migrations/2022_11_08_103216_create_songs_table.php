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
            $table->string('title');
            $table->text('artist');
            $table->text('album');
            $table->boolean('public');
            $table->text('path_song_text')->nullable();
            $table->text('path_song_text_dutch')->nullable();
            $table->text('path_sheets')->nullable();
            $table->text('path_directions')->nullable();
            $table->text('path_cover_art')->nullable();
            $table->text('path_track')->nullable();
            $table->text('path_track_solo')->nullable();
            $table->text('path_track_instrumental')->nullable();
            $table->text('path_track_soprano_1')->nullable();
            $table->text('path_track_soprano_2')->nullable();
            $table->text('path_track_contralto_1')->nullable();
            $table->text('path_track_contralto_2')->nullable();
            $table->text('path_track_tenor_1')->nullable();
            $table->text('path_track_tenor_2')->nullable();
            $table->text('path_track_bass_1')->nullable();
            $table->text('path_track_bass_2')->nullable();

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
        Schema::dropIfExists('tracks');
    }
}
