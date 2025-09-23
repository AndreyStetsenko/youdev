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
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->enum('project_type', ['web', 'website', 'ecommerce', 'design', 'marketing', 'other']);
            $table->enum('budget_range', ['under_5k', '5k_15k', '15k_50k', '50k_100k', 'over_100k']);
            $table->text('message');
            $table->enum('status', ['new', 'contacted', 'in_progress', 'completed', 'declined'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('source')->default('website'); // website, referral, etc.
            $table->json('utm_data')->nullable(); // UTM parameters for analytics
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_requests');
    }
};
