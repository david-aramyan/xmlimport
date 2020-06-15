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
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->decimal('weight', 8, 3)->nullable();
            $table->integer('quantity_0')->default(0);
            $table->integer('quantity_1')->default(0);
            $table->integer('quantity_2')->default(0);
            $table->integer('quantity_3')->default(0);
            $table->integer('quantity_4')->default(0);
            $table->integer('quantity_5')->default(0);
            $table->integer('quantity_6')->default(0);
            $table->integer('quantity_7')->default(0);
            $table->decimal('price_0')->default(0);
            $table->decimal('price_1')->default(0);
            $table->decimal('price_2')->default(0);
            $table->decimal('price_3')->default(0);
            $table->decimal('price_4')->default(0);
            $table->decimal('price_5')->default(0);
            $table->decimal('price_6')->default(0);
            $table->decimal('price_7')->default(0);
            $table->text('usage')->nullable();
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
