<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contacts')->truncate();

        $faker = Faker::create();
        $contacts = [];

        foreach(range(1, 20) as $indes )
        {
            $contacts[] = [
                'group_id' => rand(1, 25),
                'name'     => $faker->name,
                'company'  => $faker->company,
                'email'    => $faker->unique()->safeEmail,
                'phone'    => $faker->phoneNumber,
                'address'  => "{$faker->streetName} {$faker->postcode} {$faker->city}",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ];
        }

        DB::table('contacts')->insert($contacts);
    }
}
