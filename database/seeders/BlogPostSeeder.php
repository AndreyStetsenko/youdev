<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => [
                    'en' => 'The Future of Web Development: Trends to Watch in 2025',
                    'uk' => 'Майбутнє веб-розробки: тренди 2025 року'
                ],
                'slug' => 'future-web-development-trends-2025',
                'excerpt' => [
                    'en' => 'Explore the emerging trends and technologies that will shape web development in 2025, from AI integration to advanced frameworks.',
                    'uk' => 'Дослідіть нові тренди та технології, які формуватимуть веб-розробку в 2025 році, від інтеграції ШІ до передових фреймворків.'
                ],
                'content' => [
                    'en' => 'Web development is evolving rapidly, and 2025 promises to bring exciting new technologies and methodologies. In this article, we explore the key trends that will define the future of web development...',
                    'uk' => 'Веб-розробка швидко розвивається, і 2025 рік обіцяє принести захоплюючі нові технології та методології. У цій статті ми досліджуємо ключові тренди, які визначатимуть майбутнє веб-розробки...'
                ],
                'blog_category_id' => 1,
                'user_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'is_featured' => true,
                'tags' => ['web development', 'trends', '2025', 'AI', 'frameworks']
            ],
            [
                'title' => [
                    'en' => 'Laravel Best Practices: Building Scalable Applications',
                    'uk' => 'Найкращі практики Laravel: створення масштабованих додатків'
                ],
                'slug' => 'laravel-best-practices-scalable-applications',
                'excerpt' => [
                    'en' => 'Learn how to build robust and scalable Laravel applications using industry best practices and proven architectural patterns.',
                    'uk' => 'Дізнайтеся, як створювати надійні та масштабовані Laravel-додатки, використовуючи найкращі практики індустрії та перевірені архітектурні шаблони.'
                ],
                'content' => [
                    'en' => 'Laravel has become one of the most popular PHP frameworks for building web applications. In this comprehensive guide, we will explore the best practices for creating scalable Laravel applications...',
                    'uk' => 'Laravel став одним з найпопулярніших PHP-фреймворків для створення веб-додатків. У цьому всебічному посібнику ми розглянемо найкращі практики створення масштабованих Laravel-додатків...'
                ],
                'blog_category_id' => 2,
                'user_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'is_featured' => true,
                'tags' => ['Laravel', 'PHP', 'best practices', 'scalability', 'architecture']
            ],
            [
                'title' => [
                    'en' => 'Case Study: E-commerce Platform Development',
                    'uk' => 'Кейс: розробка платформи електронної комерції'
                ],
                'slug' => 'case-study-ecommerce-platform-development',
                'excerpt' => [
                    'en' => 'A detailed case study of how we built a comprehensive e-commerce platform with advanced features and integrations.',
                    'uk' => 'Детальний кейс про те, як ми створили комплексну платформу електронної комерції з розширеними функціями та інтеграціями.'
                ],
                'content' => [
                    'en' => 'Our client approached us with the need for a comprehensive e-commerce solution that could handle high traffic and complex business logic. This case study details our approach and the technologies we used...',
                    'uk' => 'Наш клієнт звернувся до нас з потребою в комплексному рішенні для електронної комерції, яке могло б обробляти високий трафік та складну бізнес-логіку. Цей кейс детально описує наш підхід та технології, які ми використовували...'
                ],
                'blog_category_id' => 3,
                'user_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(15),
                'is_featured' => false,
                'tags' => ['case study', 'e-commerce', 'Laravel', 'Vue.js', 'success story']
            ],
            [
                'title' => [
                    'en' => 'Cloud Migration Strategies for Modern Applications',
                    'uk' => 'Стратегії міграції в хмару для сучасних додатків'
                ],
                'slug' => 'cloud-migration-strategies-modern-applications',
                'excerpt' => [
                    'en' => 'Discover effective strategies for migrating your applications to the cloud while ensuring security, performance, and cost-effectiveness.',
                    'uk' => 'Відкрийте ефективні стратегії міграції ваших додатків у хмару, забезпечуючи безпеку, продуктивність та економічну ефективність.'
                ],
                'content' => [
                    'en' => 'Cloud migration is no longer a luxury but a necessity for modern businesses. In this article, we discuss proven strategies for successful cloud migration...',
                    'uk' => 'Міграція в хмару більше не є розкішшю, а необхідністю для сучасного бізнесу. У цій статті ми обговорюємо перевірені стратегії успішної міграції в хмару...'
                ],
                'blog_category_id' => 1,
                'user_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(20),
                'is_featured' => false,
                'tags' => ['cloud', 'migration', 'AWS', 'Azure', 'DevOps']
            ],
            [
                'title' => [
                    'en' => 'AI and Machine Learning in Business Applications',
                    'uk' => 'ШІ та машинне навчання в бізнес-додатках'
                ],
                'slug' => 'ai-machine-learning-business-applications',
                'excerpt' => [
                    'en' => 'How artificial intelligence and machine learning are transforming business applications and creating new opportunities.',
                    'uk' => 'Як штучний інтелект та машинне навчання трансформують бізнес-додатки та створюють нові можливості.'
                ],
                'content' => [
                    'en' => 'Artificial Intelligence and Machine Learning are revolutionizing how we build and interact with business applications. This article explores practical implementations...',
                    'uk' => 'Штучний інтелект та машинне навчання революціонізують те, як ми створюємо та взаємодіємо з бізнес-додатками. Ця стаття досліджує практичні впровадження...'
                ],
                'blog_category_id' => 4,
                'user_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(25),
                'is_featured' => true,
                'tags' => ['AI', 'machine learning', 'business', 'automation', 'innovation']
            ]
        ];

        foreach ($posts as $post) {
            \App\Models\BlogPost::create($post);
        }
    }
}
