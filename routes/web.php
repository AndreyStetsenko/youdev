<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ContactRequestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;

// Redirect root to default locale
Route::get('/', function () {
    return redirect('/en');
});

// Localized routes
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|uk'], 'middleware' => ['localization']], function () {
    // Public routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    
    // Blog routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    
    // Capability pages
    Route::get('/capabilities/data-analytics', [HomeController::class, 'dataAnalytics'])->name('capabilities.data-analytics');
    Route::get('/capabilities/cloud-services', [HomeController::class, 'cloudServices'])->name('capabilities.cloud-services');
    Route::get('/capabilities/custom-development', [HomeController::class, 'customDevelopment'])->name('capabilities.custom-development');
});

// Portfolio detail route (separate to avoid conflicts)
Route::get('/{locale}/portfolio/project/{slug}', [HomeController::class, 'portfolioShow'])
    ->where(['locale' => 'en|uk'])
    ->middleware(['localization'])
    ->name('portfolio.show');

// Admin routes (without localization)
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('portfolio', PortfolioController::class, ['as' => 'admin']);
    Route::resource('contact-requests', ContactRequestController::class, ['as' => 'admin']);
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::resource('blog-posts', BlogPostController::class, ['as' => 'admin']);
    Route::resource('blog-categories', BlogCategoryController::class, ['as' => 'admin']);
    
    // Bulk actions for contact requests
    Route::post('/contact-requests/bulk-update', [ContactRequestController::class, 'bulkUpdate'])->name('admin.contact-requests.bulk-update');
    
    // Additional admin routes
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('admin.analytics');
    Route::get('/seo-settings', [DashboardController::class, 'seoSettings'])->name('admin.seo-settings');
    Route::post('/seo-settings', [DashboardController::class, 'updateSeoSettings'])->name('admin.seo-settings.update');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/admin/login', [DashboardController::class, 'authenticate'])->name('login.store');
});

Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('logout')->middleware('auth');

// Legal pages
Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-service', function () {
    return view('pages.terms-of-service');
})->name('terms-of-service');

// Sitemap routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-main.xml', [SitemapController::class, 'main'])->name('sitemap.main');
Route::get('/sitemap-portfolio.xml', [SitemapController::class, 'portfolio'])->name('sitemap.portfolio');
Route::get('/sitemap-blog.xml', [SitemapController::class, 'blog'])->name('sitemap.blog');
Route::get('/sitemap-blog-categories.xml', [SitemapController::class, 'blogCategories'])->name('sitemap.blog-categories');
