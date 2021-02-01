<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create("cities", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });
    }

    public function drop()
    {
        Schema::dropIfExists("cities");
    }
}