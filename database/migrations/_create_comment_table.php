<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up():void{
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('module_id');
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('link')->nullable();
            $table->tinyInteger('is_private')->comment('0-public, 1-private');
            $table->timestamps();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }
    public function down():void{
        Schema::dropIfExists('comments');
    }
};
