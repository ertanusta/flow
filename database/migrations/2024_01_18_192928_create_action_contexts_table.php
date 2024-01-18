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
            $table->longText('context');
            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')
                ->references('id')
                ->on('conditions')
                ->onDelete("cascade");
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete("cascade");
            $table->unsignedBigInteger('action_id');
            $table->string('action_name');
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
