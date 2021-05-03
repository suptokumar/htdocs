<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_brand');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('product_category');
            $table->integer('product_buy');
            $table->integer('product_price');
            $table->integer('product_discount');
            $table->integer('product_quantity');
            $table->longtext('product_description');
            $table->string('product_image');
            $table->string('product_galary');
            $table->string('product_view');

            $table->string('seo_tags');
            $table->string('seo_author');
            $table->string('seo_galary');
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
        Schema::dropIfExists('products');
    }
}
