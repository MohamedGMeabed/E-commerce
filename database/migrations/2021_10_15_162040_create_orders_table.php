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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status',['pending','processing','shipped','completed'])->default('pending');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('payment_method',['cash_on_delivery','paypal','paymob'])->default('cash_on_delivery');
            $table->unsignedFloat('total');
            $table->unsignedFloat('discount')->default(0);
            $table->unsignedFloat('tax')->default(0);
            $table->unsignedFloat('shipping')->default(0);
            $table->string('order_number');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->string('shipping_address');
            $table->string('shipping_city');
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
        Schema::dropIfExists('orders');
    }
}
