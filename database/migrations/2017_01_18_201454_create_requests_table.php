<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requestor_name');
            $table->string('requestor_phone');
            $table->string('requestor_fax')->nullable();
            $table->string('scope')->nullable();
            $table->longText('details')->nullable();
            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')
                ->references('id')->on('sources')
                ->onDelete('cascade');

            $table->integer('bid_statuses_id')->unsigned();
            $table->foreign('bid_statuses_id')
                ->references('id')->on('bid_statuses')
                ->onDelete('cascade');

            $table->integer('estimator_id')->unsigned();
            $table->foreign('estimator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('create_id')->unsigned();

            $table->foreign('create_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('assign_id')->unsigned();

            $table->foreign('assign_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('editor_id')->unsigned();

            $table->foreign('editor_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('assign_date')->nullable();

            $table->integer('property_id')->nullable()->unsigned();

//            $table->foreign('property_id')
//                ->references('id')->on('properties');

            $table->integer('property_phone_id')->nullable()->unsigned();

//            $table->foreign('property_phone_id')
//                ->references('id')->on('property_phones');

            $table->integer('property_contact_id')->nullable()->unsigned();

//            $table->foreign('property_contact_id')
//                ->references('id')->on('property_contacts');

            $table->integer('property_contact_phone_id')->nullable()->unsigned();

//            $table->foreign('property_contact_phone_id')
//                ->references('id')->on('property_contact_phones');

            $table->integer('property_company_id')->nullable()->unsigned();

//            $table->foreign('property_company_id')
//                ->references('id')->on('property_management_companies');


            $table->integer('property_company_phone_id')->nullable()->unsigned();

//            $table->foreign('property_company_phone_id')
//                ->references('id')->on('property_management_company_phones');

            $table->integer('property_company_contact_id')->nullable()->unsigned();

//            $table->foreign('property_company_contact_id')
//                ->references('id')->on('property_management_company_contacts');

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
        Schema::drop('requests');
    }
}
