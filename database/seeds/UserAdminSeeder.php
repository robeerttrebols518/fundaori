<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET foreign_key_checks=0");
        DB::table('users')->truncate();
        User::truncate();
        DB::statement("SET foreign_key_checks=1");
        
        $registrar = User::create([
            'name' => 'admin',
            'lastname' => 'administrador',
            'status' => '1',
            'role'  => '1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'permissions' => '{"dashboard":"on","user_add":"on","user_list":"on","user_edit":"on","user_banned":"on","user_permissions":"on","plantilla_add":"on"}'
        ]);


    }
}
