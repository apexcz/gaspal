<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('product',['petrol','kerosine','diesel','gas']);
            $table->float('cost');
            $table->unsignedInteger('station_id');
            $table->timestamps();

            $table->foreign('station_id')->references('id')->on('stations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function(Blueprint $table) {
            $table->dropForeign('station_id');
        });
        Schema::drop('prices');
    }
}
