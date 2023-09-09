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
        Schema::connection('core')->create('action_contexts', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('name');
            $table->unsignedBigInteger('module_id');
            $table->text('context');
            $table->unsignedBigInteger('trigger_context_id');
            $table->foreign('trigger_context_id')
                ->references('id')
                ->on('trigger_contexts')
                ->onDelete('cascade');
            $table->index(['module','module_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_contexts');
    }
};
