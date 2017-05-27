<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->text('images');
            $table->integer('status');
            $table->decimal('price', 15, 2);
            $table->string('discount')->nullable();
            $table->integer('quantity')->unsigned()->nullable();

            $table->string('model')->nullable();
            $table->integer('series_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('movement_id')->unsigned();

            $table->integer('case_id')->unsigned();
            $table->integer('case_size')->nullable();
            $table->string('case_shape')->nullable();

            $table->integer('dial_id')->unsigned();
            $table->string('dial_color')->nullable();

            $table->integer('band_id')->unsigned();
            $table->string('band_length')->nullable();
            $table->string('band_width')->nullable();
            $table->string('band_clasp')->nullable();

            $table->string('feature_water_resstance')->nullable();
            $table->string('feature')->nullable();
            $table->string('functions')->nullable();

            $table->integer('style_id')->unsigned();
            $table->string('item_variation')->nullable();
            $table->string('upc_code')->nullable();

            $table->foreign('series_id')->references('id')->on('product_series')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('product_brand')->onDelete('cascade');
            $table->foreign('movement_id')->references('id')->on('product_movement')->onDelete('cascade');
            $table->foreign('case_id')->references('id')->on('product_case')->onDelete('cascade');
            $table->foreign('dial_id')->references('id')->on('product_dial')->onDelete('cascade');
            $table->foreign('band_id')->references('id')->on('product_band')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('product_style')->onDelete('cascade');
            
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
        Schema::drop('products');
    }
}
