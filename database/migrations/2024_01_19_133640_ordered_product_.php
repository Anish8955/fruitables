<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderedProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_product', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->nullable()->constrained();
            $table->foreignId('product_id')->nullable()->constrained();
            $table->integer('quantity')->default(1);
            $table->decimal('rate', 8, 2);
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
        
    }
}
