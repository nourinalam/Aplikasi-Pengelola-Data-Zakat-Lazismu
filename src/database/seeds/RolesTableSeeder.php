<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =
        [   
            [
            'name' => 'Administrator',
            'deskripsi' => 'Pengelola Website atau Webmaster'
            ],[
            'name' => 'Petugas',
            'deskripsi' => 'Petugas pengelola zakat'
            ]
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
