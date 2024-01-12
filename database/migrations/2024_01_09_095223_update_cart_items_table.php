<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            // Add the product_id column
            $table->unsignedBigInteger('product_id')->nullable();
            // Drop the product_name column
            $table->dropColumn('product_name');
            
            // If you want to add a foreign key constraint to product_id, uncomment the following line
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            // Reverse the changes made in the 'up' method
            // Add back the product_name column
            $table->string('product_name');
            // Remove the product_id column
            $table->dropColumn('product_id');
            
            // If you added a foreign key constraint, you'd drop it here.
            // $table->dropForeign(['product_id']);
        });

    }
}
