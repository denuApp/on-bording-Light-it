<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//use Illuminate\Validation\Rule;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilities', function (Blueprint $table) {
            //\Illuminate\Validation\;\

            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('airline_id')->constrained('airlines')->onDelete('cascade');

            //$table->Rule::unique(['id_airline', 'id_city']);
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
        Schema::dropIfExists('disponibilities');
    }
};
