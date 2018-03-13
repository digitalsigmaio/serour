<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_first_name');
            $table->string('ar_first_name');
            $table->string('en_last_name');
            $table->string('ar_last_name');
            $table->string('en_position');
            $table->string('ar_position');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('image');
            $table->integer('parent_company_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('parent_company_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
