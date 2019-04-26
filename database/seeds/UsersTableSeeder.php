<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{
    public function run(){
        //generating fake users and putting them in the database using the factory method
        factory(App\User::class, 100)->create();
    }
}
