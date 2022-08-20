<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->string('product_unique_code');
            $table->integer('price_per_unit');
            $table->integer('sale_price_per_unit')->nullable();
            $table->enum('status', [0, 1, 2])->default(0)->comment('0=active,1=out of stock,2=deactive');
            $table->integer('stock_quantity');
            $table->integer('stock_quantity_to_order')->nullable();
            $table->integer('tax_percentage')->nullable();
            $table->integer('estimated_shipping_days')->nullable();
            $table->string('description');
            $table->integer('delivery_charges')->nullable();
            $table->string('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('product_main_image')->nullable();
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
};
