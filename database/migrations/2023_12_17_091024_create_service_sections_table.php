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
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Service::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('heading')->nullable()->fulltext();
            $table->string('heading_type')->nullable();
            $table->string('type')->fulltext();
            $table->json('extra');

            $table->unique(['service_id', 'heading'], 'u_s_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};
