<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            [
                'name' => 'read',
                'label' => 'Read Permissions'            
            ],
            [
                'name' => 'edit',
                'label' => 'Edit Permissions'            
            ],
            [
                'name' => 'create',
                'label' => 'Create Permissions'            
            ],
            [
                'name' => 'delete',
                'label' => 'Delete Permissions'
            ]
        ];
        
        DB::table('permissions')->insert($permissions);
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
