<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku')->unique()->nullable();
            $table->unsignedDecimal('weight', 8, 2)->nullable();
            $table->unsignedDecimal('height', 8, 2)->nullable();
            $table->unsignedDecimal('width', 8, 2)->nullable();
            $table->unsignedDecimal('depth', 8, 2)->nullable();
            $table->dateTime('discontinue_on')->nullable();
            $table->tinyInteger('is_master')->default(0);
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedDecimal('cost_price', 10, 2)->nullable();
            $table->integer('position');
            $table->tinyInteger('track_inventory')->default(1);
            $table->unsignedBigInteger('tax_category_id')->index()->nullable();
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
        Schema::dropIfExists('variants');
    }
}
