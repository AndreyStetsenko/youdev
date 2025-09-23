<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => [
                    'en' => 'Technology Insights',
                    'uk' => 'Технологічні інсайти'
                ],
                'slug' => 'technology-insights',
                'description' => [
                    'en' => 'Latest trends and insights in software development and technology',
                    'uk' => 'Останні тренди та інсайти в розробці програмного забезпечення та технологіях'
                ],
                'color' => '#3B82F6',
                'order' => 1
            ],
            [
                'name' => [
                    'en' => 'Development Tips',
                    'uk' => 'Поради з розробки'
                ],
                'slug' => 'development-tips',
                'description' => [
                    'en' => 'Practical tips and best practices for software development',
                    'uk' => 'Практичні поради та найкращі практики розробки програмного забезпечення'
                ],
                'color' => '#10B981',
                'order' => 2
            ],
            [
                'name' => [
                    'en' => 'Case Studies',
                    'uk' => 'Кейси'
                ],
                'slug' => 'case-studies',
                'description' => [
                    'en' => 'Real-world project case studies and success stories',
                    'uk' => 'Кейси реальних проектів та історії успіху'
                ],
                'color' => '#8B5CF6',
                'order' => 3
            ],
            [
                'name' => [
                    'en' => 'Industry News',
                    'uk' => 'Новини індустрії'
                ],
                'slug' => 'industry-news',
                'description' => [
                    'en' => 'Latest news and updates from the software development industry',
                    'uk' => 'Останні новини та оновлення з індустрії розробки програмного забезпечення'
                ],
                'color' => '#F59E0B',
                'order' => 4
            ]
        ];

        foreach ($categories as $category) {
            \App\Models\BlogCategory::create($category);
        }
    }
}
