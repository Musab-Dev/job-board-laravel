<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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

    }
}
