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
        Schema::create('regions-photos', function (Blueprint $table) {
            $table->increments('id');

            // Create relationship with Regions table.
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')
                                        ->on('regions')
                                        ->onDelete('cascade'); // If region is deleted, 
                                                               // also delete associated photos.

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
        Schema::drop('regions-photos');
    }
}
