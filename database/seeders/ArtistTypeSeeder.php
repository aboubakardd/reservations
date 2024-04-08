<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArtistType;
use App\Models\Type;

class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

         //Define data
         $dataset = [
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Marius',
                'lastname' => 'Von Mayenburg',
                'type' => 'comédien',
            ],
         ];
         
         foreach($dataset as &$record) {
            $artist = Artist::where([
                ['firstname','=',$record['firstname']],
                ['lastname','=',$record['lastname']],
            ])->first();
            $type = Type::where(
                'type', '=', $record['type'],   
            )->first();

            $record['artist_id'] = $artist->id;
            $record['type_id'] = $type->id;
            unset($record['firstname']);
            unset($record['lastname']);
            unset($record['type']);
        }

        //Insert data in the table
        DB::table('artist_type')->insert($dataset);
     }
 }
 
