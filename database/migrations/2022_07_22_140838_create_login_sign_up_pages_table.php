<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginSignUpPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_sign_up_pages', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('login_title')->nullable();
            $table->longText('login_sub_title')->nullable();
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
        Schema::dropIfExists('login_sign_up_pages');
    }
}
