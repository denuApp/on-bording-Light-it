<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained('airlines')->onDelete('cascade');
            $table->foreignId('origin_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('cities')->onDelete('cascade');
            $table->dateTime('time_departure');
            $table->dateTime('time_arrival');
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
        Schema::dropIfExists('flights');
    }
};
