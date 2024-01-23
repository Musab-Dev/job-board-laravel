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

        Company::factory(20)->create([
            'employer_id' => $users->pop()->id
        ]);

        Job::factory(100)->create([
            'company_id' => Company::all()->random()->id
        ]);

    }
}
