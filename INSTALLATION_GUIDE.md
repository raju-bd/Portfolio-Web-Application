# Portfolio Web Application - Complete Installation Guide

## 📋 Prerequisites

Before you begin, ensure you have the following installed on your system:

| Requirement | Minimum Version | Recommended |
|-------------|---|---|
| **PHP** | 8.2 | 8.3+ |
| **MySQL** | 5.7 | 8.0+ |
| **Composer** | 2.0 | Latest |
| **Node.js** | 14.x | 18.x+ (optional) |
| **NPM** | Latest | Latest (optional) |

### Installation Verification
```bash
# Check PHP version
php -v

# Check Composer version
composer -v

# Check MySQL version
mysql --version
```

---

## 🚀 Step-by-Step Installation

### Step 1: Extract/Clone the Project

```bash
# Navigate to your desired directory
cd e:\Php\portfolio

# Or if you're cloning from Git
git clone <repository-url> portfolio
cd portfolio
```

### Step 2: Install PHP Dependencies

```bash
# Install all Composer dependencies
composer install

# This will install:
# - Laravel framework (11.x)
# - All required packages
# - Development dependencies
```

**Expected:** ~50-100MB download, takes 1-2 minutes

### Step 3: Create Environment Configuration

```bash
# Copy the example environment file
cp .env.example .env

# Or on Windows:
copy .env.example .env
```

**What's in .env:**
- Application settings
- Database credentials
- Mail configuration
- API keys
- Debug mode toggle

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

**Output:** `Application key set successfully.`

This creates a unique encryption key for your application.

### Step 5: Configure Database Connection

Edit the `.env` file with your database details:

```env
# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

**Database Setup:**

**Option A: Using MySQL CLI**
```bash
mysql -u root -p
CREATE DATABASE portfolio;
EXIT;
```

**Option B: Using phpMyAdmin**
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click "New Database"
3. Enter database name: `portfolio`
4. Click "Create"

**Option C: Using MySQL Workbench**
1. Open MySQL Workbench
2. Click "Create a New Schema"
3. Name: `portfolio`
4. Click "Apply"

### Step 6: Run Database Migrations

```bash
# Create all database tables
php artisan migrate

# If you need to reset (warning: deletes all data)
php artisan migrate:fresh
```

**Tables Created (12 total):**
- users
- skills
- projects
- services
- blog_categories
- blog_posts
- galleries
- contact_messages
- success_stories
- certifications
- counters
- site_settings

### Step 7: Seed Sample Data

```bash
# Load sample data into the database
php artisan db:seed

# Or with migration:
php artisan migrate --seed

# Seed specific data:
php artisan db:seed --class=ProjectSeeder
php artisan db:seed --class=BlogPostSeeder
php artisan db:seed --class=GallerySeeder
php artisan db:seed --class=SuccessStorySeeder
```

**Data Seeded:**
- ✅ 1 Admin user
- ✅ 8 Technical skills
- ✅ 6 Sample projects
- ✅ 5 Services
- ✅ 3 Blog categories
- ✅ 6 Blog posts
- ✅ 8 Gallery items (team + screenshots)
- ✅ 5 Success stories
- ✅ Statistics counters

### Step 8: Link Storage (Optional but Recommended)

```bash
# Create symbolic link for public file access
php artisan storage:link

# Creates: public/storage -> storage/app/public
```

### Step 9: Set Directory Permissions

**For Linux/Mac:**
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

**For Windows:**
- Usually automatic, but if issues occur:
- Right-click folder → Properties → Security → Edit Permissions

### Step 10: Verify Installation

```bash
# Check if everything is configured correctly
php artisan config:cache
php artisan route:cache
```

### Step 11: Start Development Server

```bash
# Start the built-in PHP server
php artisan serve

# Custom port (if 8000 is busy):
php artisan serve --port=8001

# Listen on all IP addresses:
php artisan serve --host=0.0.0.0
```

**Output:**
```
INFO  Server running on [http://127.0.0.1:8000]
Press Ctrl+C to quit
```

### Step 12: Access Your Application

Open your browser and navigate to:

| Page | URL | Purpose |
|------|-----|---------|
| **Frontend** | http://localhost:8000 | Public portfolio website |
| **Admin Dashboard** | http://localhost:8000/admin/dashboard | Admin control panel |
| **Admin Login** | http://localhost:8000/login | Admin authentication |

---

## 🔐 Default Admin Credentials

After running seeders, you can log in with:

```
Email:    admin@portfolio.com
Password: admin123
```

**⚠️ Important:** Change these credentials immediately in production!

### How to Change Admin Password

```bash
# Via PHP Artisan Tinker
php artisan tinker
>>> $user = App\Models\User::first();
>>> $user->password = Hash::make('new-password');
>>> $user->save();
>>> exit
```

Or via admin panel after login (feature ready to implement).

---

## 📁 Project Structure After Installation

```
portfolio/
├── 📁 public/                  # Web root - serves to browsers
│   ├── index.php              # Laravel entry point
│   ├── .htaccess              # URL rewriting rules
│   ├── css/
│   │   ├── app.css           # Main stylesheet
│   │   └── dark-mode.css     # Theme styles
│   ├── js/
│   │   └── app.js            # Application JavaScript
│   └── images/               # Project images
│
├── 📁 app/                    # Application code
│   ├── Http/Controllers/      # Route handlers
│   ├── Http/Middleware/       # Request filters
│   ├── Models/                # Database models
│   └── Exceptions/            # Error handling
│
├── 📁 database/               # Database files
│   ├── migrations/            # Schema definitions
│   └── seeders/               # Sample data
│
├── 📁 routes/                 # URL routes
│   ├── web.php                # Frontend routes
│   └── admin.php              # Admin routes
│
├── 📁 resources/views/        # Blade templates
│   ├── layouts/               # Master layouts
│   ├── frontend/              # Public pages
│   ├── admin/                 # Admin pages
│   └── auth/                  # Login page
│
├── 📁 config/                 # Configuration files
│   ├── app.php
│   ├── database.php
│   ├── cache.php
│   └── session.php
│
├── 📁 bootstrap/              # Laravel bootstrap
│   ├── app.php                # Application bootstrap
│   └── cache/                 # Cached files
│
├── 📁 storage/                # Storage directories
│   ├── app/                   # Application storage
│   ├── framework/             # Framework files
│   └── logs/                  # Application logs
│
├── 📄 .env                    # Environment variables (local)
├── 📄 .env.example            # Environment template
├── 📄 composer.json           # PHP dependencies
├── 📄 artisan                 # Laravel CLI tool
└── 📄 README.md               # Project documentation
```

---

## 🌍 Environment Configuration

### Development (.env)
```env
APP_ENV=local
APP_DEBUG=true
DB_PASSWORD=
MAIL_DRIVER=log
```

### Production (.env)
```env
APP_ENV=production
APP_DEBUG=false
DB_PASSWORD=<secure-password>
MAIL_DRIVER=smtp
```

---

## ⚙️ Advanced Configuration

### Configuring Email Notifications

For contact form email notifications, update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Portfolio"
```

### Database Backup & Restore

**Backup:**
```bash
mysqldump -u root -p portfolio > backup.sql
```

**Restore:**
```bash
mysql -u root -p portfolio < backup.sql
```

### Clear Cache & Optimize

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimize for production
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🧪 Verification Checklist

After installation, verify everything works:

- [ ] ✅ PHP 8.2+ installed
- [ ] ✅ MySQL database created
- [ ] ✅ Composer dependencies installed
- [ ] ✅ .env file configured
- [ ] ✅ Application key generated
- [ ] ✅ Database migrations completed
- [ ] ✅ Sample data seeded
- [ ] ✅ Frontend loads at http://localhost:8000
- [ ] ✅ Admin dashboard accessible
- [ ] ✅ Can login with default credentials
- [ ] ✅ Sample projects visible on portfolio page
- [ ] ✅ Blog posts visible
- [ ] ✅ Gallery displays images
- [ ] ✅ Dark mode toggle works

---

## 🐛 Common Issues & Solutions

### Issue: "Call to undefined function PDO::__construct()"
**Solution:** Install PHP PDO extension
```bash
# Ubuntu/Debian
sudo apt-get install php-mysql

# Windows: Enable php_pdo_mysql in php.ini
```

### Issue: "SQLSTATE[HY000]: General error: 1030"
**Solution:** Check MySQL is running and database exists
```bash
# Verify MySQL
mysql -u root -p
show databases;
```

### Issue: "Composer dependencies not updating"
**Solution:** Clear Composer cache
```bash
composer clear-cache
composer update
```

### Issue: "View file not found"
**Solution:** Clear view cache
```bash
php artisan view:clear
```

### Issue: "Storage link already exists"
**Solution:** Remove and recreate
```bash
rm public/storage
php artisan storage:link
```

### Issue: "Permission denied" on storage/logs
**Solution:** Fix permissions
```bash
# Linux/Mac
chmod -R 777 storage bootstrap/cache

# Windows: Check folder properties → Security
```

### Issue: "Class not found"
**Solution:** Regenerate autoloader
```bash
composer dump-autoload
```

### Issue: "Connection refused" to MySQL
**Solution:** Ensure MySQL is running
```bash
# Check MySQL service
sudo systemctl status mysql

# Or manually start
sudo systemctl start mysql
```

---

## 🚀 Next Steps

After successful installation:

1. **Customize Content:**
   - Login to admin dashboard
   - Update skills and projects
   - Upload your own images
   - Write blog posts

2. **Configure Settings:**
   - Update site name in config/app.php
   - Configure maintenance page
   - Set up email notifications

3. **Customize Design:**
   - Modify CSS in public/css/app.css
   - Update colors and fonts
   - Adjust responsive breakpoints

4. **Deployment:**
   - Choose hosting provider
   - Configure SSL certificate
   - Set up automated backups
   - Monitor error logs

---

## 📚 Useful Commands

```bash
# Database management
php artisan migrate                    # Run migrations
php artisan migrate:fresh              # Reset database
php artisan db:seed                    # Load sample data
php artisan db:seed --class=SkillSeeder # Seed specific data

# Cache management
php artisan cache:clear                # Clear cache
php artisan config:clear               # Clear config cache
php artisan view:clear                 # Clear view cache

# Server and debugging
php artisan serve                      # Start dev server
php artisan tinker                     # Interactive shell
php artisan route:list                 # Show all routes

# Code generation
php artisan make:model ModelName       # Create model
php artisan make:controller ControllerName # Create controller
php artisan make:migration create_table_name # Create migration
```

---

## 📞 Support & Resources

- **Laravel Documentation:** https://laravel.com/docs/11.x
- **Blade Templates:** https://laravel.com/docs/11.x/blade
- **Eloquent ORM:** https://laravel.com/docs/11.x/eloquent
- **MySQL Documentation:** https://dev.mysql.com/doc

---

## ✅ Installation Complete!

Your Portfolio Web Application is now ready to use. Start customizing it with your own content and build something amazing! 🚀

**Last Updated:** April 2026
**Version:** 1.0.0

## 🎨 Features

### Frontend Pages
- **Home:** Hero section, skills, projects, certifications, gallery, counters
- **About:** Profile, skills by category, certifications
- **Portfolio:** Projects showcase with filtering
- **Services:** Service listings
- **Blog:** Blog posts with categories
- **Success Stories:** Case studies
- **Gallery:** Team photos and app screenshots
- **Contact:** Contact form with database storage

### Admin Dashboard
- **Dashboard:** Statistics and quick links
- **Content Management:**
  - Skills (CRUD)
  - Projects (CRUD)
  - Services (CRUD)
  - Blog Posts & Categories (CRUD)
  - Success Stories (CRUD)
  - Certifications (CRUD)
- **Media Management:** Gallery (CRUD)
- **Messages:** Contact form submissions
- **Settings:** Counters, Maintenance Mode, Theme Mode

### Special Features
✅ **Theme Switching:** Light/Dark/System modes
✅ **Maintenance Mode:** Site-wide maintenance toggle
✅ **Responsive Design:** Mobile, tablet, desktop
✅ **SEO Friendly:** Clean URLs and meta tags
✅ **Image Optimization:** Lazy loading, storage management
✅ **Dark Mode Support:** System preference detection

## 📝 Database Tables

1. **Users** - Admin accounts with roles
2. **Skills** - Technical skills with proficiency levels
3. **Projects** - Portfolio projects with tech stack
4. **Services** - Service offerings
5. **Blog Posts** - Blog articles with categories
6. **Blog Categories** - Blog post categories
7. **Contact Messages** - Contact form submissions
8. **Galleries** - Images (colleague photos, app screenshots)
9. **Success Stories** - Case studies and achievements
10. **Certifications** - Professional badges and certificates
11. **Counters** - Statistics (companies, modules, etc.)
12. **Site Settings** - General settings and preferences

## 🔧 Common Commands

```bash
# List all routes
php artisan route:list

# Clear cache
php artisan cache:clear

# Refresh database (careful!)
php artisan migrate:refresh --seed

# Create a new migration
php artisan make:migration create_table_name

# Create a new model
php artisan make:model ModelName -m

# Create a new controller
php artisan make:controller ControllerName
```

## 📱 Admin Panel Navigation

- **Dashboard** - Overview and statistics
- **Skills** - Manage technical skills
- **Projects** - Add/edit portfolio projects
- **Services** - Manage service offerings
- **Blog Posts** - Create and manage blog content
- **Blog Categories** - Organize blog posts
- **Success Stories** - Add case studies
- **Certifications** - Upload badges and certificates
- **Gallery** - Manage images
- **Contact Messages** - View visitor inquiries
- **Counters** - Update statistics
- **Maintenance** - Enable maintenance mode

## 🌐 Deployment (Production)

1. Upload to hosting server
2. Run: `composer install --no-dev`
3. Copy `.env` and configure
4. Set `APP_DEBUG=false` in `.env`
5. Run migrations: `php artisan migrate --force`
6. Set proper file permissions:
   ```bash
   chmod -R 775 storage/
   chmod -R 775 bootstrap/cache/
   ```
7. Setup SSL/HTTPS
8. Configure web server (Nginx/Apache)

## 🐛 Troubleshooting

**Migrations not running:**
```bash
php artisan migrate:status
php artisan migrate --seed
```

**Permission denied for storage:**
```bash
chmod -R 775 storage bootstrap/cache
```

**Assets not loading:**
```bash
php artisan storage:link
```

**Clear all caches:**
```bash
php artisan optimize:clear
```

## 📧 Email Notifications (Optional)

To enable email notifications for contact form submissions:

1. Update `.env` with email configuration:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

2. Create a mailable class:
```bash
php artisan make:mail ContactNotification
```

## 🚀 Performance Optimization

- Database queries are optimized with eager loading
- Images are stored in `/storage/app/public`
- Implement caching for frequently accessed data
- Use CDN for static assets in production
- Enable gzip compression in web server

## 📞 Support

For issues or questions:
1. Check the documentation above
2. Run `php artisan tinker` for debugging
3. Check Laravel logs: `storage/logs/laravel.log`

---

**Happy coding! 🎉**
