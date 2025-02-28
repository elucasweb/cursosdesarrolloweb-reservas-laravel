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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name',120);
            $table->string('phone',20)->unique();
            $table->string('address',120);
            $table->string('image')->nullable();
            $table->unsignedSmallInteger('max_future_days')->default(10);//deixa efetuar reservas de no maximo de 10 dias
            $table->unsignedSmallInteger('slot_duration')->default(30);// A franja horaria para resservar e de 30 minutos
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
