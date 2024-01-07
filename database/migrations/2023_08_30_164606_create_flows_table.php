<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('core')->create('flows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trigger_module_id');
            $table->string('name');
            $table->boolean('status');
            $table->unsignedBigInteger('working_count')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete("cascade");
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete("cascade");
            $table->timestamps();
            $table->index(['application_id', 'trigger_module_id']);
            $table->unique(['trigger_module_id', 'application_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flows');
    }
};
