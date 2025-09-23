<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Portfolio;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate 
                            {--locales=en,uk : Comma-separated list of locales}
                            {--output=public : Output directory for sitemap files}
                            {--force : Force regenerate even if files exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemaps for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $outputDir = $this->option('output');
        $force = $this->option('force');

        $this->info('🚀 Starting sitemap generation with Spatie...');

        // Ensure output directory exists
        if (!File::exists($outputDir)) {
            File::makeDirectory($outputDir, 0755, true);
            $this->info("📁 Created output directory: {$outputDir}");
        }

        $generatedFiles = [];

        // Generate main sitemap index
        $indexPath = "{$outputDir}/sitemap.xml";
        if ($this->generateSitemapIndex($indexPath, $force)) {
            $generatedFiles[] = 'sitemap.xml';
        }

        // Generate main pages sitemap
        $mainPath = "{$outputDir}/sitemap-main.xml";
        if ($this->generateMainSitemap($mainPath, $force)) {
            $generatedFiles[] = 'sitemap-main.xml';
        }

        // Generate portfolio sitemap
        $portfolioPath = "{$outputDir}/sitemap-portfolio.xml";
        if ($this->generatePortfolioSitemap($portfolioPath, $force)) {
            $generatedFiles[] = 'sitemap-portfolio.xml';
        }

        // Generate blog sitemap
        $blogPath = "{$outputDir}/sitemap-blog.xml";
        if ($this->generateBlogSitemap($blogPath, $force)) {
            $generatedFiles[] = 'sitemap-blog.xml';
        }

        // Generate blog categories sitemap
        $blogCategoriesPath = "{$outputDir}/sitemap-blog-categories.xml";
        if ($this->generateBlogCategoriesSitemap($blogCategoriesPath, $force)) {
            $generatedFiles[] = 'sitemap-blog-categories.xml';
        }

        // Generate robots.txt
        $this->generateRobotsTxt($outputDir);

        $this->info('✅ Sitemap generation completed!');
        $this->info('📄 Generated files: ' . implode(', ', $generatedFiles));
        $this->info("🌐 Main sitemap URL: " . url('/sitemap.xml'));
    }

    /**
     * Generate sitemap index
     */
    private function generateSitemapIndex(string $path, bool $force): bool
    {
        if (File::exists($path) && !$force) {
            $this->warn("⚠️  File exists: " . basename($path) . " (use --force to overwrite)");
            return false;
        }

        $sitemap = Sitemap::create()
            ->add('/sitemap-main.xml')
            ->add('/sitemap-portfolio.xml')
            ->add('/sitemap-blog.xml')
            ->add('/sitemap-blog-categories.xml')
            ->writeToFile($path);

        $this->info("✅ Generated: " . basename($path));
        return true;
    }

    /**
     * Generate main pages sitemap
     */
    private function generateMainSitemap(string $path, bool $force): bool
    {
        if (File::exists($path) && !$force) {
            $this->warn("⚠️  File exists: " . basename($path) . " (use --force to overwrite)");
            return false;
        }

        $locales = ['en', 'uk'];
        
        // Static pages with their priorities and change frequencies
        $mainPages = [
            ['url' => '', 'priority' => 1.0, 'changefreq' => 'weekly'],
            ['url' => 'about', 'priority' => 0.8, 'changefreq' => 'monthly'],
            ['url' => 'services', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url' => 'portfolio', 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => 'contact', 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => 'blog', 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => 'capabilities/data-analytics', 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => 'capabilities/cloud-services', 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => 'capabilities/custom-development', 'priority' => 0.7, 'changefreq' => 'monthly'],
        ];

        // Legal pages
        $legalPages = [
            ['url' => 'privacy-policy', 'priority' => 0.3, 'changefreq' => 'yearly'],
            ['url' => 'terms-of-service', 'priority' => 0.3, 'changefreq' => 'yearly'],
        ];

        $allPages = array_merge($mainPages, $legalPages);
        
        $sitemap = Sitemap::create();
        
        foreach ($locales as $locale) {
            foreach ($allPages as $page) {
                $url = $page['url'] ? "/{$locale}/{$page['url']}" : "/{$locale}";
                
                $sitemapUrl = Url::create(url($url))
                    ->setPriority($page['priority'])
                    ->setChangeFrequency($page['changefreq']);
                
                // Add alternate language versions
                foreach ($locales as $altLocale) {
                    if ($altLocale !== $locale) {
                        $altUrl = $page['url'] ? "/{$altLocale}/{$page['url']}" : "/{$altLocale}";
                        $sitemapUrl->addAlternate(url($altUrl), $altLocale);
                    }
                }
                
                // Add x-default (usually English)
                $defaultUrl = $page['url'] ? "/en/{$page['url']}" : "/en";
                $sitemapUrl->addAlternate(url($defaultUrl), 'x-default');
                
                $sitemap->add($sitemapUrl);
            }
        }
        
        $sitemap->writeToFile($path);
        $this->info("✅ Generated: " . basename($path));
        return true;
    }

    /**
     * Generate portfolio sitemap
     */
    private function generatePortfolioSitemap(string $path, bool $force): bool
    {
        if (File::exists($path) && !$force) {
            $this->warn("⚠️  File exists: " . basename($path) . " (use --force to overwrite)");
            return false;
        }

        $locales = ['en', 'uk'];
        $portfolios = Portfolio::published()->get();
        
        $sitemap = Sitemap::create();
        
        foreach ($locales as $locale) {
            foreach ($portfolios as $portfolio) {
                $sitemapUrl = Url::create(route('portfolio.show', ['locale' => $locale, 'slug' => $portfolio->slug]))
                    ->setLastModificationDate($portfolio->updated_at)
                    ->setPriority(0.6)
                    ->setChangeFrequency('monthly');
                
                // Add alternate language versions
                foreach ($locales as $altLocale) {
                    if ($altLocale !== $locale) {
                        $sitemapUrl->addAlternate(route('portfolio.show', ['locale' => $altLocale, 'slug' => $portfolio->slug]), $altLocale);
                    }
                }
                
                // Add x-default
                $sitemapUrl->addAlternate(route('portfolio.show', ['locale' => 'en', 'slug' => $portfolio->slug]), 'x-default');
                
                $sitemap->add($sitemapUrl);
            }
        }
        
        $sitemap->writeToFile($path);
        $this->info("✅ Generated: " . basename($path));
        return true;
    }

    /**
     * Generate blog sitemap
     */
    private function generateBlogSitemap(string $path, bool $force): bool
    {
        if (File::exists($path) && !$force) {
            $this->warn("⚠️  File exists: " . basename($path) . " (use --force to overwrite)");
            return false;
        }

        $locales = ['en', 'uk'];
        $blogPosts = BlogPost::published()->get();
        
        $sitemap = Sitemap::create();
        
        foreach ($locales as $locale) {
            foreach ($blogPosts as $post) {
                $sitemapUrl = Url::create(route('blog.show', ['locale' => $locale, 'slug' => $post->slug]))
                    ->setLastModificationDate($post->updated_at)
                    ->setPriority(0.6)
                    ->setChangeFrequency('monthly');
                
                // Add alternate language versions
                foreach ($locales as $altLocale) {
                    if ($altLocale !== $locale) {
                        $sitemapUrl->addAlternate(route('blog.show', ['locale' => $altLocale, 'slug' => $post->slug]), $altLocale);
                    }
                }
                
                // Add x-default
                $sitemapUrl->addAlternate(route('blog.show', ['locale' => 'en', 'slug' => $post->slug]), 'x-default');
                
                $sitemap->add($sitemapUrl);
            }
        }
        
        $sitemap->writeToFile($path);
        $this->info("✅ Generated: " . basename($path));
        return true;
    }

    /**
     * Generate blog categories sitemap
     */
    private function generateBlogCategoriesSitemap(string $path, bool $force): bool
    {
        if (File::exists($path) && !$force) {
            $this->warn("⚠️  File exists: " . basename($path) . " (use --force to overwrite)");
            return false;
        }

        $locales = ['en', 'uk'];
        $categories = BlogCategory::where('is_active', true)->get();
        
        $sitemap = Sitemap::create();
        
        foreach ($locales as $locale) {
            foreach ($categories as $category) {
                $sitemapUrl = Url::create(route('blog.category', ['locale' => $locale, 'slug' => $category->slug]))
                    ->setLastModificationDate($category->updated_at)
                    ->setPriority(0.5)
                    ->setChangeFrequency('weekly');
                
                // Add alternate language versions
                foreach ($locales as $altLocale) {
                    if ($altLocale !== $locale) {
                        $sitemapUrl->addAlternate(route('blog.category', ['locale' => $altLocale, 'slug' => $category->slug]), $altLocale);
                    }
                }
                
                // Add x-default
                $sitemapUrl->addAlternate(route('blog.category', ['locale' => 'en', 'slug' => $category->slug]), 'x-default');
                
                $sitemap->add($sitemapUrl);
            }
        }
        
        $sitemap->writeToFile($path);
        $this->info("✅ Generated: " . basename($path));
        return true;
    }

    /**
     * Generate robots.txt file
     */
    private function generateRobotsTxt(string $outputDir): void
    {
        $robotsContent = "User-agent: *\n";
        $robotsContent .= "Allow: /\n\n";
        $robotsContent .= "Sitemap: " . url('/sitemap.xml') . "\n";
        
        $robotsPath = "{$outputDir}/robots.txt";
        
        if (File::put($robotsPath, $robotsContent)) {
            $this->info("📄 Generated robots.txt");
        }
    }
}
