<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_phones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone_type_id')->unsigned();
            $table->foreign('phone_type_id')
                ->references('id')->on('phone_types')
                ->onDelete('cascade');
            $table->string('area_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_ext')->nullable();

            $table->integer('property_id')->unsigned();

            $table->foreign('property_id')
                ->references('id')->on('properties')
                ->onDelete('cascade');
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
        Schema::drop('property_phones');
    }
}
