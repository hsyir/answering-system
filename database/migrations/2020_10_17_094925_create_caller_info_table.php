<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caller_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("call_id");
            $table->string("national_code")->nullable();
            $table->string("mobile_number")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("address")->nullable();
            $table->unsignedInteger("city_id")->nullable();
            $table->unsignedInteger("office_id")->nullable();
            $table->string("email")->nullable();
            $table->string("comment")->nullable();
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
        Schema::dropIfExists('caller_info');
    }
}
