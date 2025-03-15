<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('profession');
            $table->integer('experience')->default(0);
            $table->text('skills')->nullable();
            $table->text('bio');
            $table->string('profile_photo')->nullable();
            $table->string('reel_video')->nullable();
            $table->string('voice_demo')->nullable();
            $table->string('resume')->nullable();
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};

