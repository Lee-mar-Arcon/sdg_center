<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('event_date');
            $table->string('author')->nullable();
            // $table->string('short_description')->nullable();
            $table->text('content');
            $table->string('images', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_categories');
    }
};
