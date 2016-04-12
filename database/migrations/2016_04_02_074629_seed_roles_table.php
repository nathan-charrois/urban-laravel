<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roles = [
            [
                'name' => 'admin',
                'label' => 'Administrator Access'            
            ],
            [
                'name' => 'mod',
                'label' => 'Moderator Access'            
            ],
            [
                'name' => 'user',
                'label' => 'User Access'            
            ]
        ];
        
        DB::table('roles')->insert($roles);
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
