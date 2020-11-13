<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable()->comment("Responder");
            $table->integer("queue_id")->nullable();
            $table->string("unique_id")->nullable();
            $table->string("dst_number")->nullable();
            $table->string("src_number")->nullable();
            $table->integer("call_time")->nullable()->comment("in Seconds");
            $table->integer("wait_time")->nullable()->comment("in Seconds");
            $table->integer("entrance_fee")->nullable();
            $table->integer("credit_ratio")->nullable()->comment("per minute");
            $table->integer("call_amount")->nullable()->comment("without call entrance fee");
            $table->integer("total_amount")->nullable();
            $table->integer("poll_score")->nullable();
            $table->integer("status")->nullable();
            $table->string("disposition")->nullable();
            $table->dateTime("start_time")->nullable();
            $table->dateTime("end_time")->nullable();
            $table->string("credit_id")->nullable();
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
        Schema::dropIfExists('calls');
    }
}
