<?php

use App\Models\Comic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = [
            'horror',
            'comedy',
            'thriller',
            'adventure'
        ];

        for ($i = 1; $i <= 20; $i++) {
            $newComic = new Comic();
            $newComic->title = $faker->sentence();
            $newComic->description = $faker->paragraph(3, true);
            $newComic->image_url = $faker->imageUrl(350, 350, 'comic');
            $newComic->price = $faker->randomFloat(2);
            $newComic->series = $faker->word();
            $newComic->sale_date = $faker->date();
            $newComic->type = $faker->randomElement($type);
            $newComic->slug = Str::slug($newComic->title . $i, '-');
            $newComic->save();
        }
    }
}
