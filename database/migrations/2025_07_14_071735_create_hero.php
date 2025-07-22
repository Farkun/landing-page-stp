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
        Schema::create('hero', function (Blueprint $table) {
            $table->id();
            $table->text('image_url');
            $table->string('heading');
            $table->text('body');
            $table->string('button_label');
            $table->text('button_url');
            $table->integer('animo');
            $table->integer('selected');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero');
    }
};
