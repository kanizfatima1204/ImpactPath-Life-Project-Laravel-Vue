<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('feedback', function (Blueprint $table) { $table->boolean('is_demo')->default(false)->index(); });
        Schema::table('user_tests', function (Blueprint $table) { $table->boolean('is_demo')->default(false)->index(); });
        DB::table('feedback')->where('participant_name', 'like', 'Demo Participant%')->update(['is_demo' => true]);
        DB::table('user_tests')->where('participant_name', 'like', 'Demo Participant%')->update(['is_demo' => true]);
    }

    public function down(): void
    {
        Schema::table('feedback', fn (Blueprint $table) => $table->dropColumn('is_demo'));
        Schema::table('user_tests', fn (Blueprint $table) => $table->dropColumn('is_demo'));
    }
};
