<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //define data
        $dataset = [
            ['postal_code' => '1170', 'locality' => 'Watermael-Boitsfort'],
            ['postal_code' => '1000', 'locality' => 'Bruxelles'],
            ['postal_code' => '1050', 'locality' => 'Ixelles'],
            // Ajoutez ici d'autres localités si nécessaire
        ];
        //Insert data in the table
        DB::table('localities')->insert($dataset);
    }
}
