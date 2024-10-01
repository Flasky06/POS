<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
About the Project

This is a Project Management Tool built using Laravel (backend) and React with Inertia.js (frontend). The application enables users to manage projects and tasks within projects, with CRUD (Create, Read, Update, Delete) functionality for both projects and tasks.

The app provides an intuitive interface for managing multiple projects, adding and updating tasks, and organizing work efficiently, all within a modern full-stack framework.

Key Features
Project and Task Management: Users can create, edit, delete, and view tasks and projects.
Task Nesting: Each project can have multiple tasks associated with it.
User Role Management: Ability to assign tasks and projects to specific users.
Inertia.js Integration: Using Inertia.js for seamless frontend/backend interaction without full page reloads.
React Frontend: Dynamic and reactive user interface built with React.
RESTful API: Backend built with Laravel to provide robust API for frontend interactions.
File Uploads: Projects can have associated images or files, with secure file storage.
Task Filters & Sorting: Filter tasks and projects by name, status, and other parameters.
Real-Time Validation: Form validation with real-time feedback on inputs using Laravel validation.
Tech Stack
Backend: Laravel - A web application framework with expressive, elegant syntax.
Frontend: React.js - A JavaScript library for building user interfaces.
Inertia.js: A modern stack to handle frontend and backend communications efficiently.
Database: MySQL (or any database supported by Laravel).
Authentication: Laravel's authentication and authorization system.
File Storage: Local and public storage for file uploads (configurable for cloud storage like AWS or DigitalOcean).

Setup and Installation
To run this project locally:

1.Clone the repository:
    git clone https://github.com/yourusername/your-repo.git
    cd your-repo

2.Install dependencies:
    composer install
    npm install

3.Copy .env.example to .env and configure the environment variables:
    cp .env.example .env

4.Generate an application key:
    php artisan key:generate

5.Set up the database:
  Update .env with your database configuration.
  Run the following commands:
          php artisan migrate

6.Run the project:
    npm run dev
    php artisan serve

    
Visit the app at http://localhost:8000.






