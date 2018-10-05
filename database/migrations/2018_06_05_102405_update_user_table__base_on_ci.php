<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTableBaseOnCi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('users', function($table)
        {   
            $table->string('firstname' ,44)->nullable(); 
            $table->string('lastname',44)->nullable();  
            $table->string('username', 55)->nullable();  
            $table->mediumText('address')->nullable(); 
            $table->mediumText('address_2')->nullable();
            $table->integer('country')->default(0);
            $table->string('zip' ,10)->nullable();
            $table->integer('city')->default(0);
            $table->string('phone' , 20)->nullable();
            $table->string('vat_tax' , 50)->nullable();
            $table->string('image_path' , 200)->nullable();
            $table->integer('authLogin')->default(0);
            $table->integer('smsAuth')->default(0);
            $table->string('smsAuthCode' ,50 )->nullable();
            $table->string('account_name', 255)->nullable();
            $table->integer('timezone')->default(0);
            $table->integer('date_format')->default(0); 
            $table->integer('currency_format')->default(0);
            $table->integer('isDelete')->default(0);
            $table->integer('status')->default(0);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('users', function($table)
        {   
            $table->dropColumn('firstname');  
            $table->dropColumn('lastname'); 
            $table->dropColumn('username');  
            $table->dropColumn('address'); 
            $table->dropColumn('address_2');
            $table->dropColumn('country');
            $table->dropColumn('zip'); 
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table->dropColumn('vat_tax');
            $table->dropColumn('image_path');
            $table->dropColumn('authLogin');
            $table->dropColumn('smsAuth');
            $table->dropColumn('smsAuthCode' );
            $table->dropColumn('account_name');
            $table->dropColumn('timezone'); 
            $table->dropColumn('date_format'); 
            $table->dropColumn('currency_format');
            $table->dropColumn('isDelete'); 
            $table->dropColumn('status');  
        });
    }
}
