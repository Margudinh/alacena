<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ingredients', function (Blueprint $table) {
            $availableUnits = ['gr', 'lt', 'kg', 'pz'];
            $table->id();
            $table->string('name', 50);
            $table->decimal('price', unsigned: true);
            $table->enum('unit', $availableUnits);
            $table->decimal('stock', unsigned: true);
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
        Schema::dropIfExists('ingredients');
    }
}
