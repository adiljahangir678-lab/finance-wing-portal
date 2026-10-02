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
        Schema::create('daaks', function (Blueprint $table) {
          $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key[cite: 6]
        $table->string('branch_name');     // E.g., 'budget1', 'budget2'[cite: 6]
        $table->string('received_from');   // Kahan se aayi[cite: 6]
        $table->string('category');        // POL, Repair, Reward, etc.[cite: 6]
        $table->date('received_date');     // Date[cite: 6]
        $table->text('subject');           // Subject / Details[cite: 6]
        $table->string('status')->default('underprocess'); // Status Column (Pending, Underprocess, Completed)
        $table->string('pdf_path');        // PDF file path[cite: 6]
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daaks');
    }
};
