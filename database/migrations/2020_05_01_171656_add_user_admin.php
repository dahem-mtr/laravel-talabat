<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             //
             $pass = 12345678 ;
             $pass =  bcrypt($pass); 
             DB::table('users')->insert(
                 array(
                     'name' => 'admin',
                     'password' => $pass,
                     'email' => 'admin@admin.com',
                     'group_id' => 5
                 )
             );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
