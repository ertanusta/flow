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
        Schema::connection('core')->create('trigger_contexts', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('flow_id');
            $table->string('name');
            $table->foreign('flow_id')
                ->references('id')
                ->on('flows')
                ->onDelete('cascade');
            $table->text('condition');
            $table->index(['module','module_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_contexts');
    }
};
