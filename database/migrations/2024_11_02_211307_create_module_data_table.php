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
        Schema::create('module_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('module_id');
            $table->string('title');
            $table->text('comment');
            $table->json('tagged_users')->nullable();
            $table->json('values')->nullable();
            $table->json('attachments')->nullable();
            $table->json('tags')->nullable();
            $table->enum('status', ['pending', 'confirm', 'complete', 'reject', 'cancel', 'reassign'])->default('pending');
            $table->boolean('is_archive')->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_data');
    }
};
