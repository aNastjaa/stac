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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Post creator
            $table->string('title'); // Title of the post/artwork
            $table->text('description')->nullable(); // Description of the artwork
            $table->string('image_path'); // Path to the image file
            $table->enum('status', ['submitted', 'waiting', 'archived'])->default('waiting');
            $table->timestamp('submitted_at')->nullable(); // Time when the post was submitted
            $table->foreignId('theme_id')->nullable()->constrained('themes'); // Assign to a theme/month
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
