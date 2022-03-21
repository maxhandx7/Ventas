<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            


            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
