<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{

    Schema::create('catagories', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('tenant_id');
        $table->string('name',20);
        $table->string('short_description',50)->nullable();
        $table->string('long_description',200)->nullable();
        $table->string('icon')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}


public function down(): void{
    Schema::dropIfExists('catagories');
}

};
