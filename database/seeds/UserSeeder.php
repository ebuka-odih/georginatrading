<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', '=', 'user@geodecapitalinvest.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'name' => 'Geo User',
                'admin' =>  0,
                'email' => 'user@geodecapitalinvest.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('450I00RfdRID55'),

            ]);
        }
    }

}
