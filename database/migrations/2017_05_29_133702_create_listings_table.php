<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
			  	$table->integer('user_id')->unsigned();
			  	$table->string('title');
			  	$table->string('description');
			  	$table->integer('category_id')->unsigned();
            $table->timestamps();
        });
		 
		 
		 Schema::table('listings', function($table) {
       
			 $table->foreign('user_id')->references('id')->on('users');
			 $table->foreign('category_id')->references('id')->on('categories');
		 
		 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}