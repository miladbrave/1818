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
            $table->string('name',255);
            $table->string('lname',255);
            $table->string('slug',255);
            $table->bigInteger('price');
            $table->bigInteger('discount');
            $table->bigInteger('sku');
            $table->bigInteger('brand_id');
            $table->bigInteger('count');
            $table->string('exist',10);
            $table->tinyInteger('user_id');
            $table->string('type');
            $table->string('distribute',20);
            $table->text('description');

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
