<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->tinyIncrements('pos_id');
            $table->tinyInteger('dept_id')->index()->unsigned();
            $table->foreign('dept_id')
                ->references('dept_id')
                ->on('departments')
                ->onDelete('cascade');
            $table->string('pos_name', '40');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('positions');
    }
}
