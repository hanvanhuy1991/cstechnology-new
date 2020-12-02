<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionTypePrototypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_type_prototypes', function (Blueprint $table) {
            $table->unsignedInteger('prototype_id');
            $table->unsignedInteger('option_type_id');
            $table->primary(['prototype_id', 'option_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_type_prototypes');
    }
}
