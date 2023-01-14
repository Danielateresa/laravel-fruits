<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Fruit;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <10 ; $i++) { 
            $fruit = new Fruit();
            $fruit->img = 'placeholders/' . $faker->image('storage/app/public/placeholders',400, 200, 'Project', false, false);
            $fruit->name = $faker->sentence(3);
            $fruit->slug = Str::slug($fruit->name,'-');
            $fruit->weight = $faker->randomFloat(2, 50, 700);
            $fruit->price = $faker->randomFloat(2, 1, 20);
            $fruit->save();
        }
    }
}