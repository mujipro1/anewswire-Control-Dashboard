<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('site_name'); // Website name
            $table->string('link'); // Unique website URL
            $table->json('categories'); // Store categories as JSON
            $table->text('about_us')->nullable(); // About us section
            $table->string('gtm')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('data_id')->nullable();
            $table->foreign('data_id')->references('dataid')->on('website_data')->onDelete('cascade');
            
            $table->timestamps(); // Created_at & updated_at
        });
        DB::statement('ALTER TABLE websites ADD logo LONGBLOB NULL');
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
};