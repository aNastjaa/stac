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
            Schema::table('users', function (Blueprint $table) {
                // Remove 'role' column if it exists since we are moving roles to a separate table.
                if (Schema::hasColumn('users', 'role')) {
                    $table->dropColumn('role');
                }

                // Add new columns for bio, avatar, and external links
                $table->text('bio')->nullable()->after('password');
                $table->string('avatar')->nullable()->after('bio');
                $table->json('external_links')->nullable()->after('avatar');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the added columns in case of rollback
            $table->dropColumn(['bio', 'avatar', 'external_links']);
        });
    }
};
