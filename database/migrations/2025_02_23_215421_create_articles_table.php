<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('link')->unique(); // Original link
            $table->text('content');
            $table->date('pub_date'); // Store only the date (no time)
            $table->string('type');
            // New fields
            $table->json('categories')->nullable(); // Store categories as JSON array
            $table->string('guid')->unique(); // Unique identifier for the article
            $table->string('image_link')->nullable(); // Image URL (optional)

            $table->timestamps(); // Creates 'created_at' & 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
