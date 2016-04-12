<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_photos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')
                    ->references('id')
                    ->on('regions')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('path');
            $table->string('thumbnail_path');
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
        Schema::drop('regions_photos');
    }
}
