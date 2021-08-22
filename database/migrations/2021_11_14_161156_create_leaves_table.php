<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->date('StartingDate');
            $table->date('EndingDate');
            $table->integer('leave_statuses_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('leave_states_id')->unsigned();
            $table->timestamps();
            $table->foreign('leave_statuses_id')->references('id')->on('leave_statuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leave_states_id')->references('id')->on('leave_states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
