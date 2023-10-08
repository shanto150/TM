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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('party_name');
            $table->string('party_type');
            $table->date('task_date');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->integer('duration')->nullable()->comment('Minutes');
            $table->string('priority', 50)->nullable()->comment('High','Low','Medium');
            $table->integer('assign_to');
            $table->string('zone', 50)->nullable();
            $table->string('area_type', 50)->nullable();
            $table->integer('area_id')->nullable();
            $table->string('title')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->default('Planned')->comment('Planned','In Progress','Completed','cancelled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
