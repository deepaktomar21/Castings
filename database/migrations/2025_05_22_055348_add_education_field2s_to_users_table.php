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
        Schema::table('users', function (Blueprint $table) {
            $table->text('school')->nullable()->after('skills');
            $table->text('degree')->nullable()->after('school');
            $table->text('passout_year')->nullable()->after('degree');
            $table->text('institute_location')->nullable()->after('passout_year');
            $table->text('instructor')->nullable()->after('institute_location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('school');
            $table->dropColumn('degree');
            $table->dropColumn('passout_year');
            $table->dropColumn('institute_location');
            $table->dropColumn('instructor');
        });
    }
};
