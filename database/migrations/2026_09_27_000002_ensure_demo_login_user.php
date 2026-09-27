<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    public function up(): void
    {
        $attributes = [
                'name' => 'Kaniz Fatima',
                'password' => Hash::make('password'),
                'updated_at' => now(),
            ];

        if (DB::table('users')->where('email', 'demo@impactpath.test')->exists()) {
            DB::table('users')->where('email', 'demo@impactpath.test')->update($attributes);
            return;
        }

        DB::table('users')->insert($attributes + [
            'email' => 'demo@impactpath.test',
            'created_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'demo@impactpath.test')->delete();
    }
};
