<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = new User();
        $user->full_name = 'Green';
        $user->type = 'admin';
         $user->username = 'green';
        $user->email = 'admin@green.com';
        $user->password = bcrypt('secret');
        $user->save();
    }

}
