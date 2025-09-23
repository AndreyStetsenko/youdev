<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingsSeeder extends Seeder
{
    public function run()
    {
        $seoSettings = [
            [
                'page' => 'home',
                'title' => [
                    'uk' => 'Веб-розробка, UI/UX дизайн та маркетинг | Професійні послуги розробки',
                    'en' => 'Web Development, UI/UX Design & Marketing | Professional Development Services'
                ],
                'description' => [
                    'uk' => 'Професійна веб-розробка, UI/UX дизайн та цифровий маркетинг. Створюємо сучасні сайти, інтернет-магазини, CRM системи. Досвідчена команда розробників з України.',
                    'en' => 'Professional web development, UI/UX design and digital marketing. We create modern websites, e-commerce stores, CRM systems. Experienced development team from Ukraine.'
                ],
                'keywords' => [
                    'uk' => ['веб-розробка', 'UI/UX дизайн', 'маркетинг', 'сайт', 'інтернет-магазин', 'CRM', 'Laravel', 'React', 'Vue.js', 'PHP', 'JavaScript', 'дизайн сайту', 'розробка сайту', 'веб-дизайн', 'UX дизайн'],
                    'en' => ['web development', 'UI/UX design', 'marketing', 'website', 'e-commerce', 'CRM', 'Laravel', 'React', 'Vue.js', 'PHP', 'JavaScript', 'website design', 'site development', 'web design', 'UX design']
                ],
                'og_image' => 'images/og-home.jpg',
                'custom_meta' => [
                    'canonical' => '/',
                    'robots' => 'index, follow',
                    'author' => 'YouDev Team',
                    'geo.region' => 'UA',
                    'geo.country' => 'Ukraine',
                    'language' => 'uk, en'
                ]
            ],
            [
                'page' => 'about',
                'title' => [
                    'uk' => 'Про нас | Команда веб-розробників та дизайнерів | YouDev',
                    'en' => 'About Us | Web Development & Design Team | YouDev'
                ],
                'description' => [
                    'uk' => 'Дізнайтеся про нашу команду досвідчених веб-розробників та дизайнерів. Ми спеціалізуємося на створенні сучасних веб-сайтів, UI/UX дизайні та цифровому маркетингу.',
                    'en' => 'Learn about our team of experienced web developers and designers. We specialize in creating modern websites, UI/UX design and digital marketing.'
                ],
                'keywords' => [
                    'uk' => ['про нас', 'команда', 'веб-розробники', 'дизайнери', 'досвід', 'спеціалізація', 'веб-розробка', 'UI/UX', 'маркетинг'],
                    'en' => ['about us', 'team', 'web developers', 'designers', 'experience', 'specialization', 'web development', 'UI/UX', 'marketing']
                ],
                'og_image' => 'images/og-about.jpg'
            ],
            [
                'page' => 'services',
                'title' => [
                    'uk' => 'Послуги веб-розробки | Сайти, інтернет-магазини, CRM | YouDev',
                    'en' => 'Web Development Services | Websites, E-commerce, CRM | YouDev'
                ],
                'description' => [
                    'uk' => 'Повний спектр послуг веб-розробки: корпоративні сайти, інтернет-магазини, CRM системи, UI/UX дизайн, каталоги товарів. Професійна розробка під ключ.',
                    'en' => 'Full range of web development services: corporate websites, e-commerce stores, CRM systems, UI/UX design, product catalogs. Professional turnkey development.'
                ],
                'keywords' => [
                    'uk' => ['послуги', 'веб-розробка', 'сайт під ключ', 'інтернет-магазин', 'CRM', 'корпоративний сайт', 'UI/UX дизайн', 'каталог товарів', 'візитка'],
                    'en' => ['services', 'web development', 'website turnkey', 'e-commerce', 'CRM', 'corporate website', 'UI/UX design', 'product catalog', 'business card']
                ],
                'og_image' => 'images/og-services.jpg'
            ],
            [
                'page' => 'portfolio',
                'title' => [
                    'uk' => 'Портфоліо | Наші роботи веб-розробки та дизайну | YouDev',
                    'en' => 'Portfolio | Our Web Development & Design Works | YouDev'
                ],
                'description' => [
                    'uk' => 'Переглядайте наші найкращі роботи: веб-сайти, інтернет-магазини, мобільні додатки. Портфоліо досвідченої команди веб-розробників та дизайнерів.',
                    'en' => 'Browse our best works: websites, e-commerce stores, mobile applications. Portfolio of experienced web developers and designers team.'
                ],
                'keywords' => [
                    'uk' => ['портфоліо', 'роботи', 'проекти', 'сайти', 'інтернет-магазини', 'веб-розробка', 'дизайн', 'приклади робіт'],
                    'en' => ['portfolio', 'works', 'projects', 'websites', 'e-commerce', 'web development', 'design', 'work examples']
                ],
                'og_image' => 'images/og-portfolio.jpg'
            ],
            [
                'page' => 'contact',
                'title' => [
                    'uk' => 'Контакти | Замовити розробку сайту | YouDev',
                    'en' => 'Contact | Order Website Development | YouDev'
                ],
                'description' => [
                    'uk' => 'Зв\'яжіться з нами для замовлення веб-розробки. Консультація безкоштовно. Швидкий відгук та професійний підхід до кожного проекту.',
                    'en' => 'Contact us to order web development. Free consultation. Quick response and professional approach to each project.'
                ],
                'keywords' => [
                    'uk' => ['контакти', 'замовити', 'розробка сайту', 'консультація', 'зв\'язок', 'заявка'],
                    'en' => ['contact', 'order', 'website development', 'consultation', 'contact us', 'request']
                ],
                'og_image' => 'images/og-contact.jpg'
            ],
            [
                'page' => 'privacy-policy',
                'title' => [
                    'uk' => 'Політика конфіденційності - YouDev',
                    'en' => 'Privacy Policy - YouDev'
                ],
                'description' => [
                    'uk' => 'Політика конфіденційності YouDev. Як ми збираємо, використовуємо та захищаємо вашу персональну інформацію.',
                    'en' => 'YouDev Privacy Policy. How we collect, use and protect your personal information.'
                ],
                'keywords' => [
                    'uk' => ['політика конфіденційності', 'захист даних', 'персональна інформація', 'конфіденційність'],
                    'en' => ['privacy policy', 'data protection', 'personal information', 'privacy']
                ],
                'og_image' => 'images/og-default.png'
            ],
            [
                'page' => 'terms-of-service',
                'title' => [
                    'uk' => 'Умови використання - YouDev',
                    'en' => 'Terms of Service - YouDev'
                ],
                'description' => [
                    'uk' => 'Умови використання послуг YouDev. Правила та умови надання веб-розробки, дизайну та маркетингу.',
                    'en' => 'YouDev Terms of Service. Rules and conditions for web development, design and marketing services.'
                ],
                'keywords' => [
                    'uk' => ['умови використання', 'правила', 'послуги', 'веб-розробка', 'дизайн'],
                    'en' => ['terms of service', 'rules', 'services', 'web development', 'design']
                ],
                'og_image' => 'images/og-default.png'
            ]
        ];

        foreach ($seoSettings as $setting) {
            SeoSetting::updateOrCreate(
                ['page' => $setting['page']],
                $setting
            );
        }
    }
}