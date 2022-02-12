<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->integer('property_id');
            $table->integer('user_id')->nullable();
            $table->string('checkin');
            $table->string('checkout');
            $table->string('nights');
            $table->boolean('confirmed')->default(false);
            $table->integer('confirmed_by')->nullable();
            $table->boolean('paid')->default(false);


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
        Schema::dropIfExists('reservations');
    }
}
