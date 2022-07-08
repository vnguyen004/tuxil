<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Vien Nguyen',
            'username' => 'admin',
            'email' => 'vien@gmail.com',
            'is_public' => true,
            'is_admin' => true,
            'password' => 'admin!',
        ]);

        // create 50 users
        User::factory(50)->create();

        // create 10 skills
        Skill::factory(10)->create();

        collect(User::all())->map(function (User $user) {
            // create 10 experience for all users
            WorkExperience::factory(10)->create([
                'user_id' => $user->id,
            ]);

            // randomly assign skills to all users
            collect(Skill::all()->random(3))->map(function (Skill $skill) use ($user) {
                $user->skills()->attach($skill, [
                    'description' => $this->faker->sentence(),
                    'skill_since' => (Carbon::now())->subYears(rand(1, 10)),
                ]);
            });
        });
    }
}
