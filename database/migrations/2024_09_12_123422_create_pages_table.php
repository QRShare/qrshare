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
            $table->string('title', 255); // Definindo comprimento máximo
            $table->text('description');
            $table->string('slug', 255)->unique(); // Definindo comprimento máximo
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Adicionando onDelete cascade
            $table->timestamp('date')->nullable(); // Permitindo nulo se necessário
            $table->softDeletes();
            $table->timestamps();

            // Adicionando índices para colunas frequentemente consultadas
            $table->index('title');
            $table->index('slug');
            $table->index('is_active');
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
