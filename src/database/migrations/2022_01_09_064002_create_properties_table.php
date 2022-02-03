<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('unit')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('type')->nullable();
            $table->integer('guests')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('beds')->nullable();
            $table->float('bathrooms', 3, 1)->nullable();
            $table->string('listing_headline')->nullable();
            $table->text('listing_desc')->nullable();
            $table->float('listing_rating', 2, 1)->default('0.0');
            $table->string('listing_rating_count')->default('0');
            $table->string('rate')->default('10000'); // price per day in cents
            $table->string('cleaning_fee')->nullable();
            $table->boolean('visible')->default(true)->nullable();
            $table->boolean('deleted')->default(false)->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
