<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');  //slug itu nama bagian atas di url nya misal japan.com/article/jepang-negara
            $table->string('location');
            $table->longText('about');
            $table->string('featured_event');
            $table->string('language');
            $table->string('foods');
            $table->date('departure_date');
            $table->string('duration');
            $table->string('type');
            $table->integer('price');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *@return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_packages');
    }
}
