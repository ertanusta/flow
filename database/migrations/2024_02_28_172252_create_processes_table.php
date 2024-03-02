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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->string('process_id');
            $table->string('authentication_id');
            $table->string('flow_id');
            $table->string('flow_name');
            $table->string('flow_status');
            $table->string('trigger_id');
            $table->string('trigger_name');
            $table->string('trigger_application_id');
            $table->string('trigger_application_name');
            $table->string('user_id');
            $table->string('condition');
            $table->string('condition_id');
            $table->string('action_context_id');
            $table->string('action_id');
            $table->string('action_name');
            $table->string('action_application_id');
            $table->string('action_application_name');
            $table->string('cost');
            $table->string('avaible_credit');
            $table->string('message');
            $table->string('action_context');
            $table->string('transaction_id');
            $table->string('status');
            $table->json('other');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
