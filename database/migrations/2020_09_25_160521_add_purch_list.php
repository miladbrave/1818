<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchlists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('factor_number')->unsigned()->nullable();
            $table->string('product_id',100);
            $table->bigInteger('count')->nullable()->default(1);
            $table->bigInteger('price');
            $table->text('comment')->nullable();
            $table->foreign('factor_number')->references('id')->on('userlists')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('purchlists');
    }
}
