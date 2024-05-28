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
        // Create transactions table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('payment_method');
            $table->boolean('approved');
            $table->boolean('paid');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        // Remove columns and foreign key from access_tickets table
        Schema::table('access_tickets', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key
            $table->dropColumn(['user_id', 'payment_method', 'paid', 'approved']);
        });

        // Add column and foreign key for ticket_id
        Schema::table('access_tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->nullable()->after('event_session_ticket_id');
            $table->foreign('transaction_id')
                ->references('id')->on('transactions')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key constraint on transaction_id
        Schema::table('access_tickets', function (Blueprint $table) {
            $table->dropForeign(['transaction_id']);
            $table->dropColumn('transaction_id');
        });

        // Drop transactions table
        Schema::dropIfExists('transactions');

        // Add columns back to access_tickets table
        Schema::table('access_tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('payment_method');
            $table->boolean('paid');
            $table->boolean('approved');

            // Re-add foreign key constraint on user_id
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }
};
