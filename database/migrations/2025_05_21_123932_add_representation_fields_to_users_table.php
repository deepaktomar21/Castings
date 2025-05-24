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
            $table->string('representative_type')->nullable();
            $table->string('representative_name');
            $table->string('representative_email');
            $table->string('representative_phone_number', 20);
            $table->string('representative_company_name')->nullable();
            $table->string('representative_website')->nullable();
            $table->string('representative_address1')->nullable();
            $table->string('representative_address2')->nullable();
            $table->string('representative_city')->nullable();
            $table->string('representative_state')->nullable();
            $table->string('representative_zip', 20)->nullable();
            $table->string('representative_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'representative_type',
                'representative_name',
                'representative_email',
                'representative_phone_number',
                'representative_company_name',
                'representative_website',
                'representative_address1',
                'representative_address2',
                'representative_city',
                'representative_state',
                'representative_zip',
                'representative_country'
            ]);
        });
    }
};
