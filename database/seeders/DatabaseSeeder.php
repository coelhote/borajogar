<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('soccer_court_types')->updateOrInsert([
            'id' => 1,
            'name' => 'Quadra',
            'status' => true
        ]);

        DB::table('soccer_court_types')->updateOrInsert([
            'id' => 2,
            'name' => 'Sintético',
            'status' => true
        ]);

        DB::table('soccer_court_types')->updateOrInsert([
            'id' => 3,
            'name' => 'Campo',
            'status' => true
        ]);

        DB::table('soccer_court_types')->updateOrInsert([
            'id' => 4,
            'name' => 'Areia',
            'status' => true
        ]);

        DB::table('equipaments')->updateOrInsert([
            'id' => 1,
            'name' => 'Bola'
        ]);

        DB::table('equipaments')->updateOrInsert([
            'id' => 2,
            'name' => 'Cone'
        ]);

        DB::table('equipaments')->updateOrInsert([
            'id' => 3,
            'name' => 'Colete'
        ]);

        DB::table('user_role')->updateOrInsert([
            'id' => 1,
            'name' => 'admin'
        ]);

        DB::table('user_role')->updateOrInsert([
            'id' => 2,
            'name' => 'establishment'
        ]);

        DB::table('user_role')->updateOrInsert([
            'id' => 3,
            'name' => 'team'
        ]);

        DB::table('user_role')->updateOrInsert([
            'id' => 4,
            'name' => 'player'
        ]);
    }
}
