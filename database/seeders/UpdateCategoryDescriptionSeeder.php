<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class UpdateCategoryDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        Category::WhereNull('description')
            ->orderBy('id')
            ->limit(10)
            ->get()
            ->each(function ($category) use ($faker){
                $category->description = Str::limit($faker->paragraphs(3, true), 255, '');
                $category->save();
            });
    }
}
