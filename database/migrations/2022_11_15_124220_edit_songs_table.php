<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class EditSongsTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::table('tracks', function (Blueprint $table) {
//            $table->dropColumn('path');
//            $table->dropColumn('path_instrumental');
//            $table->dropColumn('path_contralto');
//            $table->dropColumn('path_soprano');
//            $table->dropColumn('path_tenor');
//            $table->dropColumn('path_bass');
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::create('tracks', function (Blueprint $table) {
//            $table->text('path');
//            $table->text('path_instrumental');
//            $table->text('path_contralto');
//            $table->text('path_soprano');
//            $table->text('path_tenor');
//            $table->text('path_bass');
//        });
//    }
//}
