<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTopSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_top_sections', function (Blueprint $table) {
            $table->id();
            $table->string('icon1')->nullable();
            $table->string('text1')->nullable();
            $table->string('icon2')->nullable();
            $table->string('text2')->nullable();
            $table->string('icon3')->nullable();
            $table->string('text3')->nullable();
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
        Schema::dropIfExists('partner_top_sections');
    }
}
