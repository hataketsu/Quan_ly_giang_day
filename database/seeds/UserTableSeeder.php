<?php

use App\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: hataketsu
 * Date: 11/25/18
 * Time: 6:15 AM
 */
class UserTableSeeder extends Seeder
{

    public function run()
    {

        $users[] = [
            "email" => "tuanlinh123496@gmal.com",
            "name"=>"SuperNova",
            "role"=>"admin",
            "password" => Hash::make("456123")];

        User::insert($users);

    }
}