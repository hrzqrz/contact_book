<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('groups')->truncate();
        $faker = Faker::create();
        $groups = [];
        foreach(range(1, 25) as $index)
        {
            $groups[] = [
                'name' => $faker->name,
                'created_at'=>new DateTime(),
                'updated_at' => new DateTime()
            ]; 
        }
        \DB::table('groups')->insert($groups);
    }
}
