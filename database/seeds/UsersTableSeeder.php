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
        $data = [
            'name' => 'Dummy Account',
            'email' => 'email@lanyerat.test',
            'username' => 'dummy',
            'avatar' => 'avatar.svg',
            'bio' => 'It\'s dummy account, please delete this if you run in production. Like with this dummy avatar? Download here <a href="https://www.vecteezy.com/vector-art/192059-flat-vector-pattern-of-wayang-gunungan">Vector Gunungan</a>',
            'provider' => 'dummy provider',
            'provider_id' => '000000000'
        ];
        User::create($data);
    }
}
