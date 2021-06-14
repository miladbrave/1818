<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id');
            $table->bigInteger('price');
            $table->bigInteger('user_id');
            $table->string('status')->nullable()->default(null);
            $table->string('payment_date')->nullable()->default(null);
            $table->string('order_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('message',255)->nullable()->default(null);
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
        Schema::dropIfExists('pays');
    }
}
