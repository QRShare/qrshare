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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('slug', 255)->unique();
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('date')->nullable();
            $table->boolean('is_public')->default(true);
            $table->json('images')->nullable();

            $table->string('date_bg_color')->default('#ffffff');
            $table->string('date_text_color')->default('#171717');
            $table->string('title_text_color')->default('#171717');
            $table->string('description_text_color')->default('#171717');
            $table->string('page_bg_color')->default('#ffffff');

            $table->softDeletes();
            $table->timestamps();

            $table->index('title');
            $table->index('slug');
            $table->index('is_active');
            $table->index('is_public');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
