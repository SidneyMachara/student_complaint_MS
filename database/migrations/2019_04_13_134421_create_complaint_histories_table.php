<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('complaint_id');
            $table->integer('lecturer_id');
            $table->integer('complaint_handler_id')->default(-1); // starts -1 --> then is updated to complaint_hander_id as u escalate
            $table->integer('is_active')->nullable(); //complaint hander
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
        Schema::dropIfExists('complaint_histories');
    }
}
