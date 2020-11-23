<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create("tickets", function (Blueprint $table) {
            $table->id();
            $table->string("subject")->nullable();
            $table->text("body")->nullable();
            $table->unsignedInteger("creator_id")->nullable();
            $table->unsignedInteger("user_id")->nullable();
            $table->unsignedInteger("department_id")->nullable();
            $table->unsignedInteger("ticket_subject_id")->nullable();
            $table->unsignedInteger("status_id")->nullable();
            $table->unsignedInteger("priority_id")->nullable();
            $table->dateTime("closed_at")->nullable();
            $table->integer("score")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function drop()
    {
        Schema::dropIfExists("tickets");
    }
}