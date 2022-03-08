<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('own_name');
            $table->integer('quantity')->nullable();
            $table->string('identify')->unique();
            $table->double('total', 10, 2);
            $table->enum('status', ['aberto', 'completo', 'rejeitado', 'processando', 'cancelado'])->default('aberto');
            $table->text('comment');
            $table->unsignedBigInteger('reup');
            $table->timestamps();

            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('qty');
            $table->double('price', 10, 2);

            $table->foreign('order_id')
                        ->references('id')
                        ->on('orders')
                        ->onDelete('cascade');
            $table->foreign('product_id')
                        ->references('id')
                        ->on('products')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
}
