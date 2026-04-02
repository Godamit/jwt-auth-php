# JWT Authentication System (PHP + MySQL)

A secure authentication system built using **Core PHP**, **MySQL**, and **JWT (JSON Web Tokens)**.  
This project demonstrates real-world backend authentication with password hashing, token-based authorization, and protected routes.

![alt text](image.png)

## Features

- User registration with email uniqueness validation
- Secure login using hashed passwords
- JWT generation on successful authentication
- JWT verification for protected routes (middleware-style)
- Session handling using HttpOnly cookies
- Protected dashboard access and logout functionality
- Clean dark-themed UI
- Proper error handling and debugging fixes

## Tech Stack

PHP (Core PHP), MySQL, JWT (firebase/php-jwt), Apache (Ubuntu/LAMP), HTML, CSS, Git, GitHub

## Authentication Flow

User registers → password is hashed → user logs in → JWT is generated and stored in an HttpOnly cookie → protected routes verify JWT → invalid or expired tokens redirect to login.

## Database Schema

```sql
CREATE DATABASE jwt_auth;
USE jwt_auth;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Installation & Setup

### 1. Database Configuration

1. Create a MySQL database named `jwt_auth`.
2. Run the SQL script provided in the **Database Schema** section above.
3. Update `db.php` with your local database credentials (host, user, password).

### 2. Install Dependencies

This project uses `firebase/php-jwt`. Ensure you have [Composer](https://getcomposer.org/) installed, then run:

```bash
composer install
```

### 3. Run the Project

You can use the PHP built-in server for quick testing:

1. Open a terminal in the project root.
2. Start the server:
   ```bash
   php -S localhost:8000
   ```
3. Visit `http://localhost:8000` in your browser.

## Security Highlights

Password hashing (bcrypt), prepared statements (SQL injection prevention), JWT expiry handling, HttpOnly cookies, controlled error messages.

## Author

Amit Pawan Pandey
