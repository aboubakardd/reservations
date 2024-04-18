<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;
use App\Models\Type;
use App\Models\ArtistType;
use App\Models\Show;


class ArtistTypeShowSeeder extends Seeder
{
        /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type_show')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $artistTypeShows = [
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=>'auteur',
                'show_slug'=>'ayiti',
            ],
            [
                'artist_firstname'=>'Philippe',
                'artist_lastname'=>'Laurent',
                'type'=>'auteur',
                'show_slug'=>'ayiti',
            ],
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=>'scénographe',
                'show_slug'=>'ayiti',
            ],
            
        ];
        
        //Prepare the data
        foreach ($artistTypeShows as &$data) {
            //Search the artist for a given artist's firstname and lastname
            $artist = Artist::where([
                ['firstname','=',$data['artist_firstname'] ],
                ['lastname','=',$data['artist_lastname'] ]
            ])->first();

            //Search the type for a given type
            $type = Type::firstWhere('type',$data['type']);

            //Search the artistType for the artist and type found
            $artistType = ArtistType::where([
                ['artist_id','=',$artist->id ],
                ['type_id','=',$type->id ]
            ])->first();
            
            //Search the show for a given show's slug
            $show = Show::firstWhere('slug',$data['show_slug']);

            unset($data['artist_firstname']);
            unset($data['artist_lastname']);
            unset($data['type']);
            unset($data['show_slug']);
            
            $data['artist_type_id'] = $artistType->id;
            $data['show_id'] = $show->id;
        }
        unset($data);

        //Insert data in the table
        DB::table('artist_type_show')->insert($artistTypeShows);
    }

}
