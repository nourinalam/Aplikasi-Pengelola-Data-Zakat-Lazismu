<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Webmaster',
            'username' => 'admin01',
            'email' => 'nurmuhlis74@yahoo.co.id',
            'password' => Hash::make('sunthr33'),
            'role_id' => '1',
            'status' => 'aktif'
        ]);
    }
}
