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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services','id')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users','id')->nullOnDelete();
            $table->string('price');
            $table->string('date_time');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('place')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_requests');
    }
};
