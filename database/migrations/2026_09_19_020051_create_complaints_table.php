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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('phone');

            $table->enum('category', [
                'wifi',
                'electricity',
                'water',
                'facility',
                'cleanliness',
                'other'
            ]);

            $table->text('description');
            $table->string('image')->nullable();

            $table->enum('status', [
                'new',
                'processing',
                'resolved'
            ])->default('new');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};