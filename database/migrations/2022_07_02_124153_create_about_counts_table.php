<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_counts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('founded')->nullable();
            $table->string('founded_value')->nullable();
            $table->string('trading_volume')->nullable();
            $table->string('trading_volume_value')->nullable();
            $table->string('nft_created')->nullable();
            $table->string('nft_created_value')->nullable();
            $table->string('total_users')->nullable();
            $table->string('total_users_value')->nullable();
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
        Schema::dropIfExists('about_counts');
    }
}
