<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->string('name');
            $table->integer('total');
            $table->string('description');
            $table->integer('price');
            $table->integer('total_price');
            $table->char('status')->default('0');
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
        Schema::dropIfExists('admin_photos');
    }
}
