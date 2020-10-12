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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');

            $table->string('name');
            $table->string('sku');
            $table->string('barcode');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->integer('quantity_alert')->nullable()->default(1);
            $table->double('purchase_price');
            $table->double('cost_price')->nullable();
            $table->double('sell_price');
            $table->boolean('status')->default(1);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

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
