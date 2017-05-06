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
            $table->string('model');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('discount');
            $table->text('detail');
            $table->text('images');
            $table->integer('status');
            $table->decimal('price', 15, 2);
            
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');

            $table->integer('series_id')->unsigned();
            $table->foreign('series_id')->references('id')->on('product_series')->onDelete('cascade');

            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('product_brand')->onDelete('cascade');

            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('product_gender')->onDelete('cascade');

            $table->integer('movement_id')->unsigned();
            $table->foreign('movement_id')->references('id')->on('product_movement')->onDelete('cascade');

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('product_case')->onDelete('cascade');
            $table->integer('case_size');
            $table->string('case_shape');

            $table->integer('dial_id')->unsigned();
            $table->foreign('dial_id')->references('id')->on('product_dial')->onDelete('cascade');
            $table->string('dial_color');

            $table->integer('band_id')->unsigned();
            $table->foreign('band_id')->references('id')->on('product_band')->onDelete('cascade');
            $table->string('band_length');
            $table->string('band_width');
            $table->string('band_clasp');

            $table->string('feature_water_resstance');
            $table->string('feature');
            $table->string('functions');
            $table->string('calender');

            $table->integer('style_id')->unsigned();
            $table->foreign('style_id')->references('id')->on('product_style')->onDelete('cascade');
            $table->string('item_variation');
            $table->string('upc_code');
            
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
