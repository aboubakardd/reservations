<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Empty the table first
        User::truncate();

        //Define data
        $users = [
            [
                'login'=>'abou',
                'firstname'=>'Abou',
                'lastname'=>'test',
                'email'=>'aboutest@gmail.com',
                'password'=>'abou1234',
                'langue'=>'fr',
                'created_at'=>'',
                'role'=>'admin',
            ],
            [
                'login'=>'anna',
                'firstname'=>'Anna',
                'lastname'=>'Lyse',
                'email'=>'anna.lyse@sull.com',
                'password'=>'12345678',
                'langue'=>'en',
                'created_at'=>'',
                'role'=>'member',
            ],
        ];
        
        foreach($users as &$user) {
            $user['created_at'] = Carbon::now()->toDateTimeString();    //date('Y-m-d G:i:s');
            $user['password'] = Hash::make($user['password']);
        }

        //Insert data in the table
        DB::table('users')->insert($users);        
    }
}
