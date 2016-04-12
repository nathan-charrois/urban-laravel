<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permission_role = [
                [
                    'role_id' => 1,
                    'permission_id' => 1,
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 2,
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 3,
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 4,
                ],
                [
                    'role_id' => 2,
                    'permission_id' => 1,
                ],
                [
                    'role_id' => 2,
                    'permission_id' => 2,
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 1,
                ]
        ];
        
        DB::table('permission_role')->insert($permission_role);
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
