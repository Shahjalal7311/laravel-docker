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
        $users = [
            [
                'name' => 'Reivo',
                'email' => 'develop@reivo.co.jp',
                'password' => '123456',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@reivo.co.jp',
                'password' => 'admin',
            ],
        ];

        foreach ( $users as $user_options ) {
            $email = $user_options['email'];
            $user = User::firstOrNew(['email' => $email]);
            $user->name = $user_options['name'];
            $user->email = $email;
            $user->password = bcrypt($user_options['password']);
            $user->save();
        }
    }
}
