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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->enum('title', \App\Task\Entity\Transaction\Enum\TitleEnum::values());
            $table->string('description')
                ->comment('Описание действий');
            $table->float('amount');
            $table->enum('status', \App\Task\Entity\Transaction\Enum\StatusEnum::values())
                ->default(\App\Task\Entity\Transaction\Enum\StatusEnum::CREATED->name);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
