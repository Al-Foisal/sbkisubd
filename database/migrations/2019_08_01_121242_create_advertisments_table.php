<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertismentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('dist_id');
            $table->unsignedInteger('thana_id');
            $table->unsignedInteger('union_id');
            $table->string('price');
            $table->string('adsduration')->nullable();
            $table->string('phone');
            $table->string('version');
            $table->string('type')->nullable();
            $table->string('edition')->nullable();
            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->string('email')->nullable();
            $table->text('description');
            $table->text('full_address')->nullable();
            $table->string('request');
            $table->string('ads_id')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('advertisments');
    }
}
