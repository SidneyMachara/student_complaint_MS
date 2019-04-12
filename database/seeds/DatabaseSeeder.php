<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert(
          [
            'name' => 'Sys Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_type' => 0,
            'remember_token' => Str::random(10),
          ]);

        DB::table('lecturers')->insert(
          [
            'user_id' => 1,
            'lecturer_id' => 000000,
          ]);



    }
}
