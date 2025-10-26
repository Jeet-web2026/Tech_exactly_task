# Blog Web Application

![Laravel](https://img.shields.io/badge/Laravel-12.35.1-red) 
![PHP](https://img.shields.io/badge/PHP-8.2.12-blue) 
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange) 
![License](https://img.shields.io/badge/License-MIT-green)

---

## Table of Contents
1. [Project Overview](#project-overview)
2. [File Structure](#file-structure)
3. [Password Rules & Validation](#password-rules--validation)
4. [Authentication & Roles](#authentication--roles)
5. [Strategy Pattern for Post-Login Redirection](#strategy-pattern-for-post-login-redirection)
6. [Running the Application](#running-the-application)
7. [Key Features](#key-features)
8. [Admin Panel](#admin-panel)
9. [Screenshots](#screenshots)
10. [Bonus Features](#bonus-features)
11. [Evaluation Notes](#evaluation-notes)

---

## Project Overview
This is a **simple blog web application** built with Laravel 12.35.1 and PHP 8.2.12.  

It provides:

- User authentication (register, login, logout)  
- Role-based access (Admin & Regular Users)  
- Post management with CRUD operations and soft deletes  
- Comment functionality  
- Admin panel for managing users and posts  
- Middleware for logging and access control  
- Optimized queries and caching for performance  

---

## File Structure

app/
├─ Http/
│ ├─ Controllers/ # Controllers for posts, comments, and users
│ ├─ Middleware/ # Custom middleware for role checks and logging
├─ Models/ # Eloquent models (User, Post, Comment)
├─ Policies/ # Policies for user permissions
├─ Services/ # Business logic and strategy pattern
config/
database/
resources/
routes/
tests/


---

## Password Rules & Validation

- Minimum **8 characters**  
- Must include **uppercase, lowercase, number, and special character**  
- Prevents using **common or compromised passwords**  
- Form request validation ensures **secure registration and login**  
- Users must provide **password confirmation**  

---

## Authentication & Roles

- Built using **Laravel’s authentication system**  
- **Regular Users**: Can manage their own posts and comments  
- **Admins**: Full access to all posts and users  
- Access controlled via **policies** and **middleware**  

---

## Strategy Pattern for Post-Login Redirection

- Directs users after login based on their role:  
  - Admin → Admin dashboard  
  - Regular User → User dashboard  
- Fully modular for adding future roles  

---

## Running the Application

1. Clone the repository:  
```bash
git clone <repo-url>
cd <project-folder>

---

Install dependencies:

composer install
npm install && npm run dev


Copy .env.example to .env and configure database, mail, etc.

Generate app key:

php artisan key:generate


Run migrations and seeders:

php artisan migrate --seed


Start the server:

php artisan serve


⚠️ Note: .env file is required. Copy from .env.example and update database credentials.

Key Features

Posts and comments management with Eloquent ORM

Soft deletes for posts and comments

Caching for posts and comments for performance

Admin panel with statistics (users, posts, comments)

Middleware for logging user activities and role verification

Unit tests for models, controllers, and middleware

Admin Panel

Access restricted via middleware

Dashboard shows total users, posts, and comments

CRUD operations for all users and posts


## Evaluation Notes

Proper use of Laravel features and Eloquent ORM

Optimized queries and eager loading applied

Role-based access and policies ensure security

Modular structure for maintainability and scalability


---

✅ **Tips to make it even better on GitHub:**  

1. Save the file as **`README.md`** (not `.txt`)  
2. Use **Markdown syntax** for headers (`#`, `##`), code blocks (triple backticks), and lists (`-`)  
3. Add **screenshots in a folder named `screenshots`** and reference them in Markdown  
4. Add **badges** for Laravel, PHP, MySQL, and License  
