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
            $table->bigIncrements('id');
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('status');
            $table->string('slug')->unique();
            $table->json('meta_description')->nullable();
            $table->json('meta_title')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->unsignedInteger('tax_category_id')->index()->nullable();
            $table->unsignedInteger('shipping_category_id')->index()->nullable();
            $table->tinyInteger('promotionable')->default(1);
            $table->dateTime('available_on')->nullable();
            $table->dateTime('discontinue_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
