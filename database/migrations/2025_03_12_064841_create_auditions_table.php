<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('auditions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_post_id')->constrained('job_posts')->onDelete('cascade');
        $table->foreignId('talent_id')->constrained('users')->onDelete('cascade');
        $table->dateTime('scheduled_at');
        $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditions');
    }
};
