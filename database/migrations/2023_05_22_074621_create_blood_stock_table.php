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
        Schema::create('blood_stock', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->string('hospital');
            $table->date('date');
            $table->timestamps();

            $table->foreignId('donor_id')->constrained('donors')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_stock');
    }
};
