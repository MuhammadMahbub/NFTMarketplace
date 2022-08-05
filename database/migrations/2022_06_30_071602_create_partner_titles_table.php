<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->longText('description1')->nullable();
            $table->string('title2')->nullable();
            $table->longText('description2')->nullable();
            $table->string('title3')->nullable();
            $table->longText('description3')->nullable();
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
        Schema::dropIfExists('partner_titles');
    }
}
