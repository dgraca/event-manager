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
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['event_id']);

            // Recreate the foreign key constraint with ON DELETE CASCADE
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key constraint with ON DELETE CASCADE
            $table->dropForeign(['event_id']);

            // Recreate the original foreign key constraint (assuming it was initially set to restrict deletes)
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('restrict'); // Adjust this line if the original behavior was different
        });
    }
};
