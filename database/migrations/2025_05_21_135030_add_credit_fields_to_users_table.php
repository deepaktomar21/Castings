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
             $table->text('credit_productionType')->nullable();
            $table->text('credit_project_name')->nullable();
            $table->text('credit_role')->nullable();
            $table->text('credit_year')->nullable();
            $table->text('credit_location')->nullable();
            $table->text('credit_month')->nullable();
            $table->text('credit_website')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn([
                'credit_production_type',
                'credit_project_name',
                'credit_role',
                'credit_year',
                'credit_location',
                'credit_month',
                'credit_website',
                
            ]);
        });
    }
};
