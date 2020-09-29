<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class My_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\My_User::factory(5)->create();
       /*$users = \App\Models\My_User::factory()->count(5)->make();
       foreach($users as $user){
        DB::table('my_user')->insert([
            'name' => $user->name,
            'lastname' => $user->lastname,
            'age' => $user->age,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }*/
    }
}
