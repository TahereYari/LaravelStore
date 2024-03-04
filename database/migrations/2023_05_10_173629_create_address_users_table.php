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
        Schema::create('address_users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('ostan');
            $table->string('shahr');
            $table->integer('code');
            $table->integer('tel');
            $table->text('address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_users');
    }
};
