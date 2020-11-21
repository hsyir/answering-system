<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketCommentsTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create("ticket_comments", function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("ticket_id");
            $table->unsignedInteger("user_id");
            $table->text("comment");
            $table->integer("level");
            $table->timestamps();
        });
    }

    public function drop()
    {
        Schema::dropIfExists("ticket_comments");
    }
}