<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ResumeStep;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $resumeSteps = [
            'Personal Information',
            'Education',
            'Work Experience',
            'Projects',
            'Hobbies',
        ];

        foreach ($resumeSteps as $order => $name) {
            ResumeStep::create([
                'name' => $name,
                'order' => $order,
            ]);
        }

        $user = User::create([
            'name' => 'Mohamed Zayed',
            'email' => 'mohamed.zayed@app.com',
            'password' => Hash::make('123456'),
        ])->fresh();

        event(new Registered($user));
    }
}
