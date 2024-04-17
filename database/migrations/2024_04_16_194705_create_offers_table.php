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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('fault_description');
            $table->unsignedSmallInteger('repair_time')->comment('in days');
            $table->decimal('labor_fee', total: 19, places: 4);
            $table->date('start_date');
            $table->date('completion_date');
            $table->bigInteger('user_id');
            $table->bigInteger('vehicle_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
