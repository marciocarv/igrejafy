Phase 1 — Deploy on the church computer (MVP)

This is the fastest and most reliable approach.

Requirements

Install only once:

PHP 8.3
Composer
MySQL Community Server (or MariaDB)
Git (optional)

Copy the IMIDE project folder to:

C:\IMIDE

Example:

C:\IMIDE

    app/
    bootstrap/
    config/
    database/
    public/
    resources/
    routes/
    storage/
    vendor/
    artisan
Configure the database

Create a database:

imide

Import your production database.

Edit the .env file:

APP_NAME=IMIDE

APP_ENV=production

APP_DEBUG=false

APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imide
DB_USERNAME=root
DB_PASSWORD=your_password

Then execute:

php artisan config:cache
php artisan route:cache
php artisan view:cache
Starting the system

# Install PHP dependencies (if needed)
composer install --no-dev --optimize-autoloader

# Generate APP_KEY (only if this is a fresh installation)
php artisan key:generate

# Run database migrations (only if the database is empty)
php artisan migrate

# Link the storage folder (if you use uploaded files now or in the future)
php artisan storage:link

# instal the vite dependencies
npm install

# create a folder public/build and generate the manifest.json file
npm run build

# Clear old caches
php artisan optimize:clear

# Create production caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize the framework
php artisan optimize

Instead of opening a terminal every time, create a Windows batch file.

# .bat file

@echo off
title IMIDE - Igreja Missionaria IDE

cd /d "%~dp0"

echo Starting IMIDE...
start /min cmd /c "php artisan serve --host=127.0.0.1 --port=8000"

timeout /t 5 /nobreak > nul

start http://127.0.0.1:8000

exit

The pastor clicks:

Start IMIDE

Waits a few seconds.

Open IMIDE

Browser opens.

Done.

Database backup

This is the most important thing.

Create:

Backup Database.bat

Example:

@echo off

set DATE=%date:~-4%%date:~3,2%%date:~0,2%

"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe" ^
-u root ^
-pYOURPASSWORD ^
imide ^
> C:\IMIDE\backups\imide_%DATE%.sql

pause

Now the church can back up the database in one click.

Restore

If the computer dies.

Install

PHP
MySQL

Copy

C:\IMIDE

Restore

imide.sql

Everything comes back.
