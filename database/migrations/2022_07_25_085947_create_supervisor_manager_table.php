<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_manager', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisor_manager');
    }
}
