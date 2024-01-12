<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('cart_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('product_name'); // Column for product name
                $table->integer('quantity')->default(1);
                $table->decimal('rate', 8, 2); // Column for rate/price, change decimal parameters as needed
                
                // Foreign key constraint for user_id referencing users table
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('cart_items');
    }
}
