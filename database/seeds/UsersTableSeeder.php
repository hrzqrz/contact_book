<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        $faker = Faker::create();
        $users = [];

        foreach(range(1, 1000) as $index)
        {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('sa243FA243%&@'),
                'remember_token' => Str::random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ];
        }

        \DB::table('users')->insert($users);
    }
}
