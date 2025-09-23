<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sitemap files automatically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔄 Updating sitemap...');
        
        // Call the generate sitemap command
        $this->call('sitemap:generate', ['--force' => true]);
        
        $this->info('✅ Sitemap updated successfully!');
    }
}
