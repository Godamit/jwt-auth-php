# JWT Authentication System (PHP + MySQL)

A secure authentication system built using **Core PHP**, **MySQL**, and **JWT (JSON Web Tokens)**.  
This project demonstrates real-world backend authentication with password hashing, token-based authorization, and protected routes.

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
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Security Highlights
Password hashing (bcrypt), prepared statements (SQL injection prevention), JWT expiry handling, HttpOnly cookies, controlled error messages.

Author
Amit Pawan Pandey



---
