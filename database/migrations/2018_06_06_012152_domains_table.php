<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('domain')) {
            Schema::create('domains', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->string('email');
                $table->string('domain',200);
                $table->integer('verified');
                $table->integer('authenticated');
                $table->string('verificationCode',50);
                $table->mediumText('successMessage');
                $table->integer('isDelete');
                $table->integer('status');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
         }   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain');
    }
}

