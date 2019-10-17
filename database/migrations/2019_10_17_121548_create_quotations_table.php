<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('description', 200);
            $table->string('address', 150);
            $table->string('street_number', 20);
            $table->string('neighborhood', 150);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('uf', 2);
            $table->string('zip_code', 9);
            $table->string('contact_name', 200);
            $table->string('contact_email', 100);
            $table->string('contact_phone', 15);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
