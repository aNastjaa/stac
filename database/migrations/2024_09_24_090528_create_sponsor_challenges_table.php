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
        Schema::create('sponsor_challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('brief');
            $table->foreignId('sponsor_id')->constrained()->onDelete('cascade');
            $table->date('submission_deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsor_challenges');
    }
};
