<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => [
                    'en' => 'E-commerce Platform',
                    'uk' => 'Платформа електронної комерції'
                ],
                'description' => [
                    'en' => 'A comprehensive e-commerce solution with advanced inventory management, payment processing, and analytics dashboard.',
                    'uk' => 'Комплексне рішення для електронної комерції з розширеним управлінням інвентарем, обробкою платежів та аналітичною панеллю.'
                ],
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'Stripe', 'Redis'],
                'category' => 'web',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'order' => 1
            ],
            [
                'title' => [
                    'en' => 'Mobile Banking App',
                    'uk' => 'Мобільний банківський додаток'
                ],
                'description' => [
                    'en' => 'Secure mobile banking application with biometric authentication, real-time transactions, and budget management features.',
                    'uk' => 'Безпечний мобільний банківський додаток з біометричною аутентифікацією, транзакціями в реальному часі та функціями управління бюджетом.'
                ],
                'technologies' => ['Flutter', 'Node.js', 'MongoDB', 'JWT', 'Plaid API'],
                'category' => 'mobile',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'order' => 2
            ],
            [
                'title' => [
                    'en' => 'Healthcare Management System',
                    'uk' => 'Система управління охороною здоровʼя'
                ],
                'description' => [
                    'en' => 'Comprehensive healthcare management platform for clinics with patient records, appointment scheduling, and billing integration.',
                    'uk' => 'Комплексна платформа управління охороною здоровʼя для клінік з записами пацієнтів, плануванням прийомів та інтеграцією виставлення рахунків.'
                ],
                'technologies' => ['Laravel', 'React', 'PostgreSQL', 'Docker', 'AWS'],
                'category' => 'web',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'order' => 3
            ],
            [
                'title' => [
                    'en' => 'Real Estate CRM',
                    'uk' => 'CRM для нерухомості'
                ],
                'description' => [
                    'en' => 'Customer relationship management system tailored for real estate agents with lead tracking, property management, and automated marketing.',
                    'uk' => 'Система управління взаємовідносинами з клієнтами, адаптована для агентів нерухомості з відстеженням лідів, управлінням нерухомістю та автоматизованим маркетингом.'
                ],
                'technologies' => ['Laravel', 'Alpine.js', 'MySQL', 'Mailgun', 'Google Maps API'],
                'category' => 'web',
                'status' => 'in_progress',
                'is_featured' => false,
                'is_published' => true,
                'order' => 4
            ],
            [
                'title' => [
                    'en' => 'API Gateway Service',
                    'uk' => 'Сервіс API Gateway'
                ],
                'description' => [
                    'en' => 'High-performance API gateway with rate limiting, authentication, monitoring, and load balancing capabilities.',
                    'uk' => 'Високопродуктивний API gateway з обмеженням швидкості, аутентифікацією, моніторингом та можливостями балансування навантаження.'
                ],
                'technologies' => ['Node.js', 'Express', 'Redis', 'Nginx', 'Docker'],
                'category' => 'api',
                'status' => 'completed',
                'is_featured' => false,
                'is_published' => true,
                'order' => 5
            ]
        ];

        foreach ($projects as $project) {
            \App\Models\Portfolio::create($project);
        }
    }
}
