<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')
                ->nullable()
                ->references('id')
                ->on('flight_statuses')
                ->nullOnDelete();
            $table->foreignId('airport_from')
                ->nullable()
                ->references('id')
                ->on('airports')
                ->nullOnDelete();
            $table->foreignId('airport_to')
                ->nullable()
                ->references('id')
                ->on('airports')
                ->nullOnDelete();
            $table->dateTime('departure_time');
            $table->foreignId('departure_timezone')
                ->nullable()
                ->references('id')
                ->on('timezones')
                ->nullOnDelete();
            $table->dateTime('arrival_time');
            $table->foreignId('arrival_timezone')
                ->nullable()
                ->references('id')
                ->on('timezones')
                ->nullOnDelete();
            $table->integer('passengers')
                ->default(0)
                ->unsigned();
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
