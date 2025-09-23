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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id');
        });
        
        // Generate slugs for existing records
        $portfolios = \App\Models\Portfolio::whereNull('slug')->get();
        foreach ($portfolios as $portfolio) {
            $portfolio->slug = \App\Models\Portfolio::generateSlug($portfolio->getLocalizedTitle());
            $portfolio->save();
        }
        
        // Now make it unique and not nullable
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
