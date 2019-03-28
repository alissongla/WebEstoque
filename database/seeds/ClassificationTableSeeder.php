<?php

use Illuminate\Database\Seeder;

class ClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=1; $i<=100; $i++) {
            DB::table('classifications')->insert([
                'descricao' => $faker->text(30),
                'created_at' => Carbon\Carbon::now(),
            ]);
        }
    }
}
