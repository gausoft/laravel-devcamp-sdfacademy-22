<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->string('slug');
            $table->string('image');
            $table->double('cost');
            $table->double('deposit')->comment('La caution');
            $table->text('description');
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->string('city');
            $table->string('street');
            $table->unsignedBigInteger('advertiser_id');
            $table->timestamps();
        
            $table->foreign('advertiser_id')->references('id')->on('advertisers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
