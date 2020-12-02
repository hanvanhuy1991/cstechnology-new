<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrototypeTaxonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prototype_taxons', function (Blueprint $table) {
            $table->unsignedBigInteger('taxon_id');
            $table->unsignedBigInteger('prototype_id');
            $table->primary(['taxon_id', 'prototype_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prototype_taxons');
    }
}
