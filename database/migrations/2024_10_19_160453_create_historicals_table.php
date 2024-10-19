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
        Schema::create('historicals', function (Blueprint $table) {
            $table->id();
            $table->longText('text_input')->nullable(true);
            $table->longText('text_output')->nullable(true);
            $table->enum('type', ['text', 'file', 'dicionary']);
            $table->string('language_from');
            $table->string('language_to');
            $table->string('path_file')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicals');
    }
};
