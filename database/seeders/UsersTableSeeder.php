<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Moussa Ndao',
                'email'=>'moussandaodevpro@gmail.com',
                'password'=>Hash::make('moussa@admin'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'Matar',
                'email'=>'serignematarmbaye2000@gmail.com',
                'password'=>Hash::make('matar@user'),
                'role'=>'user',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
