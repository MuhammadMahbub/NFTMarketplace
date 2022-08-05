<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('phone_title')->nullable();
            $table->string('phone_icon')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_title')->nullable();
            $table->string('address_icon')->nullable();
            $table->string('address')->nullable();
            $table->string('email_title')->nullable();
            $table->string('email_icon')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('contact_addresses');
    }
}
