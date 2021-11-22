<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('piches');
            $table->integer('category_id');
            $table->integer('subCategory_id');
            $table->string('menu1')->nullable();
            $table->string('menu2')->nullable();
            $table->string('menu3')->nullable();
            $table->string('menu4')->nullable();
            $table->string('menu5')->nullable();
            $table->string('menu6')->nullable();
            $table->string('menu7')->nullable();
            $table->string('menu8')->nullable();
            $table->string('menu9')->nullable();
            $table->string('menu10')->nullable();
            $table->string('menu11')->nullable();
            $table->string('menu12')->nullable();
            $table->string('menu13')->nullable();
            $table->string('menu14')->nullable();
            $table->string('menu15')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
