<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintHandlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_handlers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('level');
            $table->integer('complaint_type');
            $table->integer('lecturer_id');
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
        Schema::dropIfExists('complaint_handlers');
    }
}
