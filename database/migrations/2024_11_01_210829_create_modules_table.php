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
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('catagory_id');
            $table->string('name', 20);
            $table->string('long_description', 200)->nullable();
            $table->string('short_description', 50)->nullable();
            $table->json('fields')->nullable();
            $table->json('settings')->nullable();
            $table->json('workflow')->nullable();
            $table->json('queue_users')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
