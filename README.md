# DevStudio - Software Development Company Landing

Modern, multilingual landing page for a software development company built with Laravel, Tailwind CSS, and Alpine.js.

## 🚀 Features

### Public Website
- **Modern Design**: Clean, professional design with smooth animations
- **Multilingual**: Ukrainian and English language support
- **Responsive**: Mobile-first responsive design
- **SEO Optimized**: Meta tags, structured data, and performance optimization
- **Contact Forms**: Advanced contact form with UTM tracking
- **Portfolio Showcase**: Dynamic portfolio with filtering
- **Service Pages**: Detailed service descriptions

### Admin Panel
- **Dashboard**: Overview of website performance and metrics
- **Analytics**: Detailed analytics for contact requests and user behavior
- **Portfolio Management**: CRUD operations for portfolio projects
- **Contact Request Management**: View and manage incoming requests
- **SEO Settings**: Manage meta tags and SEO settings per page
- **User Management**: Admin user authentication

## 🛠 Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS 4 + Alpine.js 3
- **Database**: SQLite (easily configurable to MySQL/PostgreSQL)
- **Build Tools**: Vite
- **Languages**: PHP 8.2+, JavaScript

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18 or higher
- NPM or Yarn

### Setup Steps

1. **Clone the repository**
```bash
git clone <repository-url>
cd ydev
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node.js dependencies**
```bash
npm install
```

4. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Database setup**
```bash
php artisan migrate
php artisan db:seed --class=PortfolioSeeder
php artisan db:seed --class=SeoSettingsSeeder
php artisan db:seed --class=UserSeeder
```

6. **Build assets**
```bash
npm run build
```

7. **Start the development server**
```bash
php artisan serve
```

The website will be available at `http://localhost:8000`

## 🎯 Demo Credentials

### Admin Panel Access
- **URL**: `http://localhost:8000/admin/login`
- **Email**: `admin@devstudio.com`
- **Password**: `password123`

## 🌐 Language Support

The website supports two languages:
- **English** (`/en`): Default language
- **Ukrainian** (`/uk`): Ukrainian localization

Language switching is available via the floating language switcher on all pages.

## 📊 Admin Features

### Dashboard
- Total contact requests statistics
- New requests counter
- Portfolio projects count
- Monthly request trends
- Recent requests overview

### Portfolio Management
- Add/edit/delete portfolio projects
- Multilingual content support
- Image upload and gallery management
- Project categorization
- Featured projects highlighting

### Contact Request Management
- View all incoming requests
- Filter by status, type, and date
- Update request status
- View detailed request information including UTM data

### Analytics
- Monthly request trends
- Project type distribution
- Budget range analysis
- Source tracking
- Conversion metrics

### SEO Management
- Page-specific meta titles and descriptions
- Multilingual SEO content
- Keywords management
- Open Graph tags
- Twitter Card optimization

## 🎨 Design Features

### Modern UI/UX
- Clean, professional design
- Smooth animations and transitions
- Interactive elements with Alpine.js
- Mobile-first responsive design
- Accessibility considerations

### Color Scheme
- Primary: Blue (#3B82F6)
- Secondary: Purple (#8B5CF6)
- Accent colors for different sections
- Consistent color usage throughout

### Typography
- Inter font family
- Proper font weights and sizes
- Good contrast ratios
- Readable line heights

## 📱 Responsive Design

The website is fully responsive and optimized for:
- Desktop (1024px+)
- Tablet (768px - 1023px)
- Mobile (320px - 767px)

## ⚡ Performance

### Optimization Features
- Vite for fast asset compilation
- CSS purging with Tailwind
- Optimized images and assets
- Minimal JavaScript footprint
- Efficient database queries

### SEO Optimization
- Semantic HTML structure
- Meta tags and Open Graph
- Structured data markup
- Fast loading times
- Mobile-friendly design

## 🔧 Configuration

### Environment Variables
```env
APP_NAME="DevStudio"
APP_URL=http://localhost:8000
APP_LOCALE=en
APP_FALLBACK_LOCALE=en

# Database
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Google Analytics (optional)
GOOGLE_ANALYTICS_ID=your_ga_id

# Mail Configuration (for contact forms)
MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@devstudio.com
MAIL_FROM_NAME="DevStudio"
```

### Customization

#### Adding New Languages
1. Create language files in `resources/lang/{locale}/`
2. Update the localization middleware
3. Add language options to the switcher component

#### Modifying Design
1. Update Tailwind classes in Blade templates
2. Modify CSS in `resources/css/app.css`
3. Rebuild assets with `npm run build`

#### Adding New Pages
1. Create new routes in `routes/web.php`
2. Create controller methods
3. Create Blade templates
4. Add navigation links

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Configure your web server (Apache/Nginx)
3. Set up SSL certificate
4. Configure caching and optimization
5. Set up backup procedures

### Recommended Server Requirements
- PHP 8.2+
- MySQL 8.0+ or PostgreSQL 13+
- Redis (for caching)
- SSL certificate
- Regular backups

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📞 Support

For support and questions:
- Email: admin@devstudio.com
- Documentation: Check the code comments and this README
- Issues: Use the GitHub issues tracker

---

Built with ❤️ using Laravel, Tailwind CSS, and Alpine.js