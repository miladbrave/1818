<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributevalueProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributevalue_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributevalue_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('attributevalue_id')->references('id')->on('attributevalues');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('attributevalue_product');
    }
}
