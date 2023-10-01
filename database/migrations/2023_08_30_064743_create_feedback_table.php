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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->date('f_date');
            $table->string('f_type', 50);
            $table->integer('party_id');
            $table->string('offer_category', 50)->nullable();
            $table->integer('airline_id')->nullable();
            $table->string('channel', 20)->nullable();
            $table->string('discount_value', 50);
            $table->string('additional_discount', 50)->nullable();
            $table->string('area_type', 50)->nullable();
            $table->integer('area_id')->nullable();
            $table->string('Validity_type', 20)->comment('days/date range')->nullable();
            $table->string('days', 20)->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('note', 300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
