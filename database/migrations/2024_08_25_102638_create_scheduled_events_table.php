<?php

use App\Enums\Game\ScheduledEventType;
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
        Schema::create('scheduled_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default(ScheduledEventType::EVENT->value);
            $table->enum('recurrence_type', ['daily', 'weekly', 'interval']);
            $table->json('schedule');
            $table->integer('interval_minutes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_events');
    }
};
