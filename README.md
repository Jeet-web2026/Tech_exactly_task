Blog Web Application

Table of Contents

Project Overview

File Structure

Password Rules & Validation

Authentication & Roles

Strategy Pattern for Post-Login Redirection

Running the Application

Key Features

Admin Panel

Screenshots

Bonus Features

Evaluation Notes

Project Overview

This is a simple blog web application built with Laravel 12.35.1 and PHP 8.2.12.

It provides:

User authentication (register, login, logout)

Role-based access (Admin & Regular Users)

Post management with CRUD operations and soft deletes

Comment functionality

Admin panel for managing users and posts

Middleware for logging and access control

Optimized queries and caching for performance

File Structure
app/
├─ Http/
│  ├─ Controllers/      # Controllers for posts, comments, and users
│  ├─ Middleware/       # Custom middleware for role checks and logging
├─ Models/              # Eloquent models (User, Post, Comment)
├─ Policies/            # Policies for user permissions
├─ Services/            # Business logic and strategy pattern
config/
database/
resources/
routes/
tests/

Password Rules & Validation

Minimum 8 characters

Must include uppercase, lowercase, number, and special character

Prevents using common or compromised passwords

Form request validation ensures secure registration and login

Users must provide password confirmation

Authentication & Roles

Built using Laravel’s authentication system

Regular Users: Can manage their own posts and comments

Admins: Full access to all posts and users

Access controlled via policies and middleware

Strategy Pattern for Post-Login Redirection

Directs users after login based on their role

Admin → Admin dashboard

Regular User → User dashboard

Fully modular for adding future roles

Running the Application

Clone the repository

git clone <repo-url>
cd <project-folder>


Install dependencies

composer install
npm install && npm run dev


Copy .env.example to .env and configure database, mail, etc.

Generate app key

php artisan key:generate


Run migrations and seeders

php artisan migrate --seed


Start the server

php artisan serve


⚠️ Note: .env file is required for configuration. Copy from .env.example and update database credentials.

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