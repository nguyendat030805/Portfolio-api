<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
        });
    }
};
