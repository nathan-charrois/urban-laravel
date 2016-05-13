<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'permission_role';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csv/permission_role.csv';
        $this->mapping = [
            0 => 'role_id',
            1 => 'permission_id'
        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table($this->table)->truncate();

        parent::run();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
