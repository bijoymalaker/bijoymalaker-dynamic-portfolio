<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('avatar_path')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('location')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'avatar_path',
                'email',
                'phone',
                'birthday',
                'location',
                'facebook',
                'twitter',
                'instagram',
                'github',
                'linkedin'
            ]);
        });
    }
};
