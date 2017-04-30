<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHungrymeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->text('item_description');
            $table->integer('price');
            $table->string('image');

            $table->timestamps();
        });
        Schema::create('site_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password'); 

            $table->timestamps();
        });
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_quantity');
            $table->integer('item_id')->unsigned();
            $table->integer('siteuser_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_id')
                    ->references('id')
                    ->on('items')
                    ->onDelete('cascade');
            $table->foreign('siteuser_id')
                    ->references('id')
                    ->on('site_users')
                    ->onDelete('cascade');
        });

         Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_user_id')->unsigned();
            $table->integer('total_price');
            $table->foreign('siteuser_id')
                    ->references('id')
                    ->on('site_users')
                    ->onDelete('cascade');
             

            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_quantity');
            $table->integer('item_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_id')
                    ->references('id')
                    ->on('items')
                    ->onDelete('cascade');
            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
        Schema::drop('invoices');
        Schema::drop('carts');
        Schema::drop('site_users');
        Schema::drop('items');
    }
}
