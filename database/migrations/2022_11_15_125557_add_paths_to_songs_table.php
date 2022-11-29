<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class AddPathsToSongsTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::table('songs', function (Blueprint $table) {
//            $table->text('path_0')->nullable();
//            $table->text('path_1')->nullable();
//            $table->text('path_2')->nullable();
//            $table->text('path_3')->nullable();
//            $table->text('path_4')->nullable();
//            $table->text('path_5')->nullable();
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
//        Schema::table('songs', function (Blueprint $table) {
//            $table->dropColumn('path_0');
//            $table->dropColumn('path_1');
//            $table->dropColumn('path_2');
//            $table->dropColumn('path_3');
//            $table->dropColumn('path_4');
//            $table->dropColumn('path_5');
//        });
//    }
//}
