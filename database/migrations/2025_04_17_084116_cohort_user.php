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
        // Creation of the cohort_user pivot table
        Schema::create('cohort_user', function (Blueprint $table) {
            $table->id();
            // We create a user_id column and if a user is deleted, his or her records in this table will also be deleted automatically
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // The same applies to the cohort_id column, which points to the cohorts table
            $table->foreignId('cohort_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // To avoid duplication
            $table->unique(['user_id', 'cohort_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deletes the cohort_user table if the migration is rollbacked
        Schema::dropIfExists('cohort_user');
    }
};
