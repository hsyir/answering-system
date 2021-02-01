<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create("offices", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->integer("city_id");
            $table->string("name");
            $table->timestamps();
        });
    }

    public function drop()
    {
        Schema::dropIfExists("offices");
    }
}