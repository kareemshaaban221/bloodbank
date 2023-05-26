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
        Schema::create('donor_requests', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->string('hospital')->nullable();
            $table->timestamp('date')->nullable();
            $table->enum('status', ['accepted', 'rejected', 'pending']);
            $table->timestamps();

            // constrains
            $table->foreignId('donor_id')->constrained('donors')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donner_requests');
    }
};
