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
        Schema::create('entregas_terminadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');
            $table->unsignedBigInteger('EntregaID');
            $table->foreign('EntregaID')->references('id')->on('entregas');
            $table->string('Address');
            $table->decimal('Price',total:5,places:2);
            $table->boolean('Entregue');
            $table->boolean('SaiuParaEntrega');
            $table->boolean('EntregaCancelada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas_terminadas');
    }
};
