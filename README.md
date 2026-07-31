# Tech Solutions

Tech Solutions is a PHP/MySQL web application for employee and operations management. It includes a modern public landing page with a video hero and a protected admin dashboard for managing employees, departments and registration records.

For portfolio deployment, the public landing page now runs in frontend-only mode by default. That means it can be uploaded to PHP hosting without creating a database. The admin/MySQL backend is optional and only activates when `TECHSOLUTIONS_ENABLE_BACKEND=1` is set on a server that has the database configured.

## Features

- Modern responsive landing page.
- Video hero section kept from the original project.
- Animated solution, pricing, workflow and contact sections.
- Contact form connected to the existing database.
- Login-protected admin dashboard.
- Simplified admin dashboard without demo charts/template noise.
- CRUD pages for:
  - Puntoret / Employees
  - Departamentet / Departments
  - Regjistrimet / Registrations
- Cleaner admin navigation.
- Improved login UI/CSS.

## Tech Stack

- PHP
- MySQL
- XAMPP / Apache
- Bootstrap
- Font Awesome
- Custom CSS

## Project Structure

```text
techsolutions/
+-- index.php              # Public landing page
+-- style1.css             # Landing page styles
+-- autoloader1.php        # Frontend autoloader
+-- admin/
|   +-- index.php          # Admin dashboard
|   +-- login.php          # Admin login
|   +-- lib/               # PHP classes and database layer
|   +-- inc/               # Admin header/nav/footer
|   +-- css/               # Admin styles
|   +-- images/            # Video and media assets
|   +-- vendor/            # Local frontend vendor assets used by admin
```

## Local Setup

1. Place the project in:

   ```text
   C:\xampp\htdocs\techsolutions
   ```

2. Start Apache and MySQL in XAMPP.

3. Make sure the database exists in phpMyAdmin:

   ```text
   techsolutions
   ```

4. Database credentials are configured in:

   ```text
   admin/lib/Database.php
   ```

   Default local values:

   ```php
   DB_HOST = localhost
   DB_USER = root
   DB_PASS = empty
   DB_NAME = techsolutions
   ```

5. Open the public site:

   ```text
   http://localhost/techsolutions/
   ```

6. Open admin login:

   ```text
   http://localhost/techsolutions/admin/login.php
   ```

## GitHub Notes

This repository includes a `.gitignore` for local files, archives, editor settings and Node dependencies.

If you already created the GitHub repository:

```bash
git init
git add .
git commit -m "Initial Tech Solutions project"
git branch -M main
git remote add origin https://github.com/USERNAME/REPOSITORY.git
git push -u origin main
```

Replace `USERNAME/REPOSITORY` with your GitHub repository path.

## Frontend-Only Deploy

For portfolio/demo hosting without database:

1. Upload these to the public hosting folder, for example `htdocs`:

   ```text
   index.php
   style1.css
   deploy-check.php
   admin/images/
   ```

2. Open:

   ```text
   /deploy-check.php
   ```

3. If it says `Status: ready`, open the website.

In frontend-only mode:

- The landing page works.
- The video hero and images work if `admin/images` is uploaded.
- The contact form shows a demo success message and does not require MySQL.
- Admin login/dashboard is hidden from the public landing page.

## Full PHP/MySQL Deploy

If the admin backend is needed, deploy on PHP/MySQL hosting or a VPS with Apache/Nginx, PHP and MySQL.

Required:

- MySQL database named `techsolutions`.
- Correct credentials in `admin/lib/Database.php`.
- Environment variable `TECHSOLUTIONS_ENABLE_BACKEND=1`.
- Full `admin/` folder uploaded.

Static hosting platforms do not run the PHP backend directly.
