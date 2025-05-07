
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // Primary key for the job
            $table->string('queue');  // Queue name the job belongs to
            $table->text('payload');  // Job data, stored as JSON
            $table->unsignedInteger('attempts')->default(0);  // Number of attempts for the job
            $table->timestamp('reserved_at')->nullable();  // When the job was reserved for processing
            $table->timestamp('available_at');  // When the job becomes available to be processed
            $table->timestamps();  // Includes created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
