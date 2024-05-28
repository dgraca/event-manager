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
        Schema::table('access_tickets', function (Blueprint $table) {
            // Drop the existing column
            $table->dropForeign(['payment_option_id']);
            $table->dropColumn('payment_option_id');
            // Add the new column
            $table->string('payment_method', 15)->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('access_tickets', function (Blueprint $table) {
            // Drop the new column
            $table->dropColumn('payment_method');
            // Re-add the old column with foreign key constraint
            $table->foreignId('payment_option_id')->nullable()->constrained()->nullOnDelete()->after('user_id');
        });
    }
};
