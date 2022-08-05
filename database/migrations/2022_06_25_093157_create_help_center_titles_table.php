<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpCenterTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_center_titles', function (Blueprint $table) {
            $table->id();
            $table->string('help_center_title')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('category_title')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('faq_meta_title')->nullable();
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
        Schema::dropIfExists('help_center_titles');
    }
}
