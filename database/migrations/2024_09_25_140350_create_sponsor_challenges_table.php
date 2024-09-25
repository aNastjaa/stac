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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('brief');
            $table->string('brand_name');
            $table->uuid('brand_logo_id')->nullable();
            $table->timestamp('submission_deadline');
            $table->timestamps();

            $table->foreign('brand_logo_id')->references('id')->on('uploads');
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
