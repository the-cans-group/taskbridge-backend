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
        Schema::create('module_data_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('module_data_id');
            $table->string('action_type');
            $table->text('comment')->nullable();
            $table->json('changes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('module_data_id')->references('id')->on('module_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_data_logs');
    }
};
