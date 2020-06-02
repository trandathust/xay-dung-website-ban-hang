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
            $table->string('name');
            $table->integer('price');
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->string('content');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('quantity');
            $table->string('brand_id');
            $table->integer('price_sale')->nullable();
            $table->datetime('start_sale')->nullable();
            $table->datetime('end_sale')->nullable();
            $table->integer('supplier_id');
            $table->string('size')->nullable();
            $table->float('weight')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
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
