<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Eloquent\Model;

class CitiesTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'cities';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csv/cities.csv';
        $this->mapping = [
            0 => 'id',
            1 => 'country',
            2 => 'city',
            3 => 'long',
            4 => 'lat',
            5 => 'altitude'
        ];
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}