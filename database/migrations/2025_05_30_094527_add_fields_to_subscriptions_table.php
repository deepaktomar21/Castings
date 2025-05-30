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
    Schema::table('subscriptions', function (Blueprint $table) {
        // Check if columns do not already exist to avoid errors during repeated migrations
        if (!Schema::hasColumn('subscriptions', 'slug')) {
            $table->string('slug')->unique()->after('name');
        }

        if (!Schema::hasColumn('subscriptions', 'billing_interval')) {
            $table->enum('billing_interval', ['monthly', 'yearly'])->default('monthly')->after('price');
        }

        if (!Schema::hasColumn('subscriptions', 'trial_days')) {
            $table->integer('trial_days')->default(0)->after('duration');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            //
        });
    }
};
