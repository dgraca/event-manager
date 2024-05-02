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
        // users
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone',32)->nullable()->after('email');
            $table->string('vat', 32)->nullable()->after('phone');
            $table->string('address', 512)->nullable()->after('vat');
            $table->string('location')->nullable()->after('address');
            $table->string('country', 2)->default('PT')->after('location');
            $table->string('postcode', 16)->nullable()->after('country');
        });

        // entities
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // entity_user
        Schema::create('entity_user', function (Blueprint $table) {
            $table->id();
            // foreign key for entity table
            $table->foreignId('entity_id')->constrained()->onDelete('cascade');
            // foreign key for user table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // payment_options
        Schema::create('payment_options', function (Blueprint $table) {
            $table->id();
            // foreign key for entity table
            $table->foreignId('entity_id')->constrained()->onDelete('cascade');
            $table->string('business_entity_name');
            $table->string('vat', 32)->nullable();
            $table->string('address', 512)->nullable();
            $table->string('location')->nullable();
            $table->string('country',2)->nullable();
            $table->string('postcode', 16)->nullable();
            $table->string('email')->nullable();
            $table->text('data')->nullable(); // stored in json format
            $table->string('currency', 3)->default('EUR');
            $table->timestamps();
        });

        // venues
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            // foreign key for entity table
            $table->foreignId('entity_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('address', 512)->nullable();
            $table->string('location')->nullable();
            $table->string('country', 2)->nullable();
            $table->string('postcode', 16)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // zones
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            // foreign key for venue table
            $table->foreignId('venue_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('max_capacity')->nullable();
            $table->timestamps();
        });

        // events
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // foreign key for entity table
            $table->foreignId('entity_id')->constrained()->onDelete('cascade');
            $table->foreignId('venue_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->dateTime('scheduled_start')->nullable();
            $table->dateTime('scheduled_end')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('registration_note')->nullable();
            $table->boolean('pre_approval')->default(false);
            $table->integer('max_capacity')->nullable();
            $table->smallInteger('type')->comment('0: on-site, 1: online, 2: hybrid')->nullable();
            $table->smallInteger('status')->comment('0: draft, 1: available, 2: closed, 3: cancelled, 4: finished')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // event_sessions
        Schema::create('event_sessions', function (Blueprint $table) {
            $table->id();
            // foreign key for event table
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('max_capacity')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('rrule')->nullable();
            $table->smallInteger('type')->comment('0: on-site, 1: online, 2: hybrid')->nullable();
            $table->smallInteger('status')->comment('0: draft, 1: available, 2: closed, 3: cancelled, 4: finished')->nullable();
            $table->timestamps();
        });

        // tickets
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            // foreign key for event table
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('zone_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->text('description')->nullable();
            $table->smallInteger('max_check_in')->nullable(); // how many times one ticket can be checked in
            $table->smallInteger('max_tickets_per_order')->nullable();
            $table->decimal('price',12,2)->nullable();
            $table->string('currency', 3)->default('EUR');
            $table->timestamps();
        });


        // session_ticket
        Schema::create('event_session_ticket', function (Blueprint $table) {
            $table->id();
            // foreign key for session table
            $table->foreignId('event_session_id')->constrained()->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->integer('limit')->nullable(); // max ticket that can be sold
            $table->integer('count')->default(0); // current number of tickets sold
            $table->dateTime('scheduled_start')->nullable();
            $table->dateTime('scheduled_end')->nullable();
            $table->timestamps();
        });

        // access_tickets
        Schema::create('access_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_session_ticket_id')->constrained('event_session_ticket')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('payment_option_id')->nullable()->constrained()->nullOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->smallInteger('tickets_count');
            $table->boolean('approved');
            $table->smallInteger('status')->comment('0: available, 1: used, 2: cancelled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_tickets');
        Schema::dropIfExists('event_session_ticket');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('event_sessions');
        Schema::dropIfExists('events');
        Schema::dropIfExists('zones');
        Schema::dropIfExists('venues');
        Schema::dropIfExists('payment_options');
        Schema::dropIfExists('entity_user');
        Schema::dropIfExists('entities');
        Schema::dropColumns('users', ['phone', 'vat', 'address', 'location', 'country', 'postcode']);
    }
};
