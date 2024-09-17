<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $todos = [];
        for ($i = 1; $i <= 1000; $i++) {
            $todos[] = [
                'title' => 'Todo ' . $i . ' for user ' . $user->id,
                'description' => 'Todo Description ' . $i . ' for user ' . $user->id,
                'completed' => false,
                'user_id' => $user->id,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert todos in batches
        DB::table('todos')->insert($todos);
    }
}
