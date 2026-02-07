# JWT Authentication System (PHP + MySQL)

A secure authentication system built using **PHP**, **MySQL**, and **JWT (JSON Web Tokens)**.  
This project demonstrates real-world backend authentication with protected routes, password hashing, and token-based authorization.

---

## 🚀 Features

- User Registration with validation
- Secure Login using hashed passwords
- JWT generation on successful login
- JWT verification for protected routes
- Session-based authentication using cookies
- Protected Dashboard access
- Logout functionality
- Clean dark UI
- Proper error handling and security practices

---

## 🛠️ Tech Stack

- **Backend**: PHP (Core PHP)
- **Database**: MySQL
- **Authentication**: JWT (firebase/php-jwt)
- **Server**: Apache (Ubuntu / XAMPP / LAMP)
- **Frontend**: HTML + CSS (Dark theme)

---

## 📁 Project Structure

jwt-php/
│── css/
│ └── style.css
│── db.php
│── jwt.php
│── auth.php
│── register.php
│── login.php
│── dashboard.php
│── logout.php
│── vendor/
│── README.md

---

## 🔐 Authentication Flow

1. User registers with email and password
2. Password is hashed using `password_hash()`
3. User logs in with valid credentials
4. JWT is generated and stored in an HttpOnly cookie
5. Protected routes verify JWT before granting access
6. Invalid or expired tokens redirect user to login

---

## 🗄️ Database Schema

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

▶️ How to Run the Project
Clone the repository

Move project to /var/www/html/

Start Apache and MySQL

Create database jwt_auth

Import the table schema

Install dependencies:


composer install
Open browser:
http://localhost/jwt-php/register.php

🧠 Security Highlights

Password hashing (bcrypt)

Prepared statements (SQL injection prevention)

JWT expiration handling

HttpOnly cookies

Controlled error messages

🎯 Learning Outcome

This project helped in understanding:

JWT-based authentication

PHP backend security practices

Real-world debugging (500 errors, redeclared functions, invalid tokens)

Clean authentication flow design

📌 Author

Amit Pandey
Aspiring Backend / Full Stack Developer


```
