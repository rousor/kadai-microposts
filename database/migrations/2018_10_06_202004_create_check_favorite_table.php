<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checker_favorited', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checker_id')->unsigned()->index();
            $table->integer('favorited_id')->unsigned()->index();
            $table->timestamps();

            // 外部キー設定
            $table->foreign('checker_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('favorited_id')->references('id')->on('microposts')->onDelete('cascade');
            
            // favoriter_idとfavorited_idの組み合わせの重複を許さない
            $table->unique(['checker_id', 'favorited_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_favorite');
    }
}
