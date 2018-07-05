<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStructuredUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('us_name', '30')->unique()->nullable();
            $table->string('password', '60')->nullable();
            $table->string('email');
            $table->string('name', '30')->nullable();
            $table->string('lastname', '30')->nullable();
            $table->string('address', '100')->nullable();
            $table->date('birthday')->nullable();
            $table->char('tel','10')->nullable();

            $table->unsignedTinyInteger('dept_id')->nullable()->index();
            $table->foreign('dept_id')
                ->references('dept_id')
                ->on('departments')
                ->onDelete('cascade');

            $table->unsignedTinyInteger('pos_id')->nullable()->index();
            $table->foreign('pos_id')
                ->references('pos_id')
                ->on('positions')
                ->onDelete('cascade');

            $table->unsignedTinyInteger('provider')->default('1')->index();
            $table->foreign('provider')
                ->references('provider')
                ->on('providers')
                ->onDelete('cascade');

            $table->char('provider_id', '30')->nullable();
            $table->string('avatar', '40')->nullable();
            $table->boolean('status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
