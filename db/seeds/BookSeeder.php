<?php


use Phinx\Seed\AbstractSeed;


class BookSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $random = rand(0, 100);
        $name = null;

        if ($random % 2 == 0)
            $name = $faker->firstNameMale() . ' ' . $faker->lastName();
        else
            $name = $faker->firstNameFemale() . ' ' . $faker->lastName();

        $data = [
            [
                'title'    => $faker->sentence(5),
                'price' => $faker->randomFloat(2, 10, 70),
                'isbn' => $faker->isbn10(),
                'author' => $name,
                'image' => $faker->imageUrl(200, 200, 'books', true),
                'parution' => $faker->date(),
                'created' => $faker->date(),
            ],
        ];

        $posts = $this->table('books');
        $posts->insert($data)
            ->saveData();
    }
}
