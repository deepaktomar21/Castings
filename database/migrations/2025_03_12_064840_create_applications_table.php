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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_post_id')->constrained('job_posts')->onDelete('cascade');
        $table->foreignId('talent_id')->constrained('users')->onDelete('cascade');
        $table->enum('status', ['submitted', 'reviewed', 'shortlisted', 'rejected'])->default('submitted');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
