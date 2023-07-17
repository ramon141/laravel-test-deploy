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
        Schema::create('pre_offers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('shift',['M','V','N'])->nullable();
            $table->enum('formatType',['B','N'])->nullable();
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('discipline_id');
            $table->string('siap_coordenador');
            $table->boolean('this_is_pro_discipline');

            $table->timestamps();

            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('turma_id')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_offers');
    }
};
