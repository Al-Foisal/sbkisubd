<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membershipforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customerId');
            $table->string('shopname');
            $table->string('shopholdername');
            $table->string('shopholderphone');
            $table->string('shopaddress');
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
        Schema::dropIfExists('membershipforms');
    }
}
