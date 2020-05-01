<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [ 'id' => 1 , 'name' => 'users'], 
            [ 'id' => 2 , 'name' => 'customers'], 
            [ 'id' => 3 , 'name' => 'delegates'], 
            [ 'id' => 4 , 'name' => 'employees'], 
            [ 'id' => 5 , 'name' => 'admins'],  
         ];

        DB::table('groups')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group', function (Blueprint $table) {
            //
        });
    }
}
