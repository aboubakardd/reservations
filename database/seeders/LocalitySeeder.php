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
        //define data
        $dataset = [
            ['postal_code' => '75001', 'locality' => 'Paris'],
            ['postal_code' => '75002', 'locality' => 'Bruxelles'],
            ['postal_code' => '75003', 'locality' => 'Los Angeles'],
        ];    
        //Insert data in the table
        DB::table('localities')->insert($dataset);
    }
}
