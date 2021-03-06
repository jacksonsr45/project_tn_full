<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');
            $table->string('title');
            $table->float('collection', 10, 2);
            $table->float('delivered', 10, 2);
            $table->float('complement', 10, 2);
            $table->float('deposit', 10, 2);
            $table->float('loot', 10, 2);
            $table->float('returned', 10, 2);
            $table->float('expenses', 10, 2);
            $table->float('total', 10, 2);
            $table->timestamps();
            $table->foreign('entity_id')->references('id')->on('entities')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('account_id')->references('id')->on('bank_accounts')
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
        Schema::dropIfExists('travels');
    }
}
