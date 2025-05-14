

# Laravel Multi-Authentication System
A secure and robust multi-authentication system for Laravel applications without using Laravel Breeze. This implementation provides separate authentication systems for regular users and administrators.

## Features
- Separate authentication for users and admin
- Dedicated models, controllers, and middleware for each user type
- Isolated dashboards and protected routes
- Customizable views and routes
- Secure password hashing and validation
- Remember me functionality
- Admin-only login (admin creation through seeding)
- User session management


## Requirements
- PHP 8.1+
- Laravel 10+
- MySQL 8.0+


## Usage

### Authentication
1. User 
  - Visit **/register** to create a new user account.
  - Visit **/login** to access their account.
  - After login, users are redirected to Dashboard **/dashboard**.   

2. Admin
  - Visit **/admin/login** to access the admin dashboard.
  - Use the **AdminSeeder** to create an admin account.
  - After login redirect to **/admin/dashboard**.







