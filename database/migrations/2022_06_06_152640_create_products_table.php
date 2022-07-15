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
            $table->string('name')->nullable();
            $table->string('price_high')->nullable();
            $table->string('price_low')->nullable();
            $table->string('type')->nullable();
            $table->boolean('zamidar')->default(1);
            $table->boolean('status')->default(1);
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('tags')->nullable();
            $table->longText('description')->nullable();
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
