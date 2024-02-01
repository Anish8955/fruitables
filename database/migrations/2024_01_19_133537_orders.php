<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
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

            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('address_id')->nullable()->constrained();

            $table->string('transaction_id')->nullable();
            
            $table->enum('payment_mode', ['COD', 'ONLINE'])->default('COD');
            $table->enum('status', ['pending', 'approved', 'in-transit', 'delivered'])->default('pending');

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
