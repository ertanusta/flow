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
        Schema::connection(
            'core'
        )
            ->create('ideasoft_actions', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('application_id');
                $table->foreign('application_id')
                    ->references('id')
                    ->on('applications')
                    ->onDelete("cascade");
                $table->string('identifier');
                $table->json('fields');
                $table->decimal('cost');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
