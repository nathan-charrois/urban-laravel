<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'roles';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csv/roles.csv';
        $this->mapping = [
            0 => 'id',
            1 => 'name',
            2 => 'label'
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
