<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tablename')->insert([
            ['admin_id'=>2 , 'admin_email'=>'admin@gmail.com', 
            'admin_password'=>bcrypt(1234),'admin_name'=>'Huỳnh Bửu', 'admin_phone'=>0947735006]
        ]);
    }
}
