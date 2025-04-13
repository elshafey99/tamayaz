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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->json('image')->nullable();
            $table->string('link_zoom')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->json('file')->nullable();
            $table->json('video')->nullable();
            // $table->string('code')->unique()->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->enum('status', [1, 0])->default(0);
            $table->foreignId('stage_id')->nullable()->constrained('stages','id')->cascadeOnDelete();
            $table->foreignId('grade_id')->nullable()->constrained('grades' ,'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
