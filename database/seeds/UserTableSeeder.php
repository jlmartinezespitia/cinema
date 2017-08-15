<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	[
        		'name' 		=> 'Jimmy',
        		'email'		=> 'jimmy@connors.com',
        		'password'	=> \Hash::make('123456'),
        	]
        );
    	User::insert($data);


    }
}
