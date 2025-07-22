# 💻 One-Line User Form with Status Toggle

A simple full-stack web application using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript** to:
- Submit user data (name & age)
- Display all records in a table
- Toggle user status between `0` and `1` instantly

---

## 🗂️ Project Structure

user-form/
├── index.php # Frontend + HTML form + JavaScript table
├── api.php # Backend logic: insert, fetch, toggle
├── db.php # Database connection file
└── README.md # Project documentation


---

## 🚀 Features

- 📝 One-line form to collect **name** and **age**
- 📋 Displays submitted records in a dynamic HTML table
- 🔁 Toggle **status (0/1)** for each record without reloading the page
- 🧩 Modular PHP backend using `api.php`
- 🔄 Fetch and update using **JavaScript + Fetch API**

---

## 🛠️ How to Run Locally (Using XAMPP)

### 1. Start Apache & MySQL
Open **XAMPP Control Panel** and click "Start" next to:
- Apache
- MySQL

### 2. Create the Database
1. Go to: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Create a new database named: `sampledb`
3. Run the following SQL to create the `users` table:


##(sql)

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  age INT NOT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


3. Place The 3 Files in XAMPP
   1. db.php
   2. api.php
   3. index.php


  
4.5. Run the Project
Open your browser and go to (http://localhost/user-form/)


<img width="1885" height="408" alt="Screenshot 2025-07-22 115531" src="https://github.com/user-attachments/assets/20c6a897-be92-45aa-b888-17f7ae47d3e1" />


