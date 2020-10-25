<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->integer('number');
            $table->string('neighborhood');
            $table->string('complement')->nullable();
            $table->integer('zip_code');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}
