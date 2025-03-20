<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('website_data', function (Blueprint $table) {
            $table->id('dataid'); // Primary key
            $table->text('name')->nullable(); // About us section
            $table->text('description')->nullable();
            
            $table->json('header_links')->nullable(); // Store header links as JSON
            $table->timestamps(); // Laravel's default timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_data');
    }
};
