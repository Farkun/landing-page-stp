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
        Schema::create('app_setting', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->text('app_logo');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('primary_color');
            $table->string('primary_content_color');
            $table->string('secondary_color');
            $table->string('secondary_content_color');
            $table->string('accent_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_setting');
    }
};
