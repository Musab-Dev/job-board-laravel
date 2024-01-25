<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplicant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Musab',
            'email' => 'test@gmail.com',
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 1; $i <= 20; $i++) {
            Company::factory()->create([
                'employer_id' => $users->pop()->id
            ]);
        }

        for ($i = 1; $i <= 100; $i++) {
            Job::factory()->create([
                'company_id' => Company::all()->random()->id
            ]);
        }

        foreach (User::all() as $user) {
            $jobs = Job::inRandomOrder()->take(random_int(0, 5));
            foreach ($jobs as $job) {
                JobApplicant::create([
                    'job_id' => $job->id,
                    'applicant_id' => $user->id,
                    'expected_salary' => random_int(5_000, 170_000),
                ]);
            }
        }
    }
}
