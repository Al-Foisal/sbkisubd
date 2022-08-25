<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'role_id'=>'1',
        'name'=>'superadmin',
        'username'=>'User01',
        'email'=>'superadmin@gmail.com',
        'phone'=>'+8801877100001',
        'designation'=>'CEO',
        'status'=>'1',
        'password'=>bcrypt('superadmin123'),
        ]);


        DB::table('users')->insert([
        'role_id'=>'2',
        'name'=>'Admin',
        'username'=>'User02',
        'email'=>'admin@gmail.com',
        'phone'=>'+8801877100002',
        'designation'=>'HR',
         'status'=>'1',
        'password'=>bcrypt('admin123'),

        ]);


        DB::table('users')->insert([
        'role_id'=>'3',
        'name'=>'Editor',
        'username'=>'User03',
        'email'=>'editor@gmail.com',
        'phone'=>'+8801877100003',
        'designation'=>'GM',
         'status'=>'1',
        'password'=>bcrypt('editor123'),

        ]);


        DB::table('users')->insert([
        'role_id'=>'4',
        'name'=>'Author',
        'username'=>'User04',
        'email'=>'author@gmail.com',
        'phone'=>'+8801877100004',
         'status'=>'1',
        'designation'=>'H.W',
        'password'=>bcrypt('author123'),

        ]);
    }
}
