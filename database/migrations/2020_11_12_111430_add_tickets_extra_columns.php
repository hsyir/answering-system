<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketsExtraColumns extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::table("tickets", function ( $table) {
            $table->unsignedInteger("call_id")->nullable();
            $table->string("national_code")->nullable();
            $table->string("mobile_number")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("address")->nullable();
            $table->unsignedInteger("city_id")->nullable();
            $table->unsignedInteger("office_id")->nullable();
            $table->string("email")->nullable();
        });
    }

    public function drop()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('call_id');
            $table->dropColumn('national_code');
            $table->dropColumn('mobile_number');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('city_id');
            $table->dropColumn('office_id');
            $table->dropColumn('email');
        });
    }
}