<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateCallsTable extends Migration
{
    public function up()
    {
        Schema::create("calls",function (Blueprint $table){
            $table->id();

        });
    }

    public function down(){
        Schema::dropIfExists("calls");
    }
}