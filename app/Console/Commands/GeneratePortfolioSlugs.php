<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePortfolioSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'portfolio:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing portfolio projects';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $portfolios = \App\Models\Portfolio::whereNull('slug')->orWhere('slug', '')->get();
        
        if ($portfolios->isEmpty()) {
            $this->info('All portfolio projects already have slugs.');
            return;
        }

        $this->info("Found {$portfolios->count()} portfolio projects without slugs.");

        foreach ($portfolios as $portfolio) {
            $slug = \App\Models\Portfolio::generateSlug($portfolio->getLocalizedTitle());
            $portfolio->update(['slug' => $slug]);
            $this->line("Generated slug for '{$portfolio->getLocalizedTitle()}': {$slug}");
        }

        $this->info('✅ All portfolio slugs generated successfully!');
    }
}
