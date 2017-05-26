<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('total', 13, 2);
            $table->integer('status')->nullable();
            $table->string('type', 50)->nullable();
            $table->string('note')->nullable();
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
        Schema::drop('oders');
    }
}
