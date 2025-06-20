# 📝 Customized Grading System — A BEGINNER PROJECT

📅 **Created:** 2022  
📚 **Subject:** WEBPROG (Web Programming)  
🎓 **Target Users:** IT211 and IT212 Sections  
🔰 **Level:** Beginner

---

## 📌 Project Description

This project is a **Customized Grading System** developed for our Web Programming subject. It supports two academic sections: **IT211** and **IT212**, with grading based on customized evaluation criteria.

Built using:

- 🧩 **PHP**
- 🎨 **HTML + ArgonCSS**
- 🗃️ **MySQL** (via XAMPP)

---

## ⚙️ Features

### 👤 Super Admin Panel

- Add multiple judge accounts
- Create and manage groups per section
- View analytics and breakdown:
  - 📊 Group Rankings
  - 📈 Average Scores
  - 🥧 Pie Charts of score division per judge per group
  - 🔍 Individual judge scoring records for transparency

### 👨‍⚖️ Judge Panel

- Grade different groups
- Simple and clean interface
- Includes error handling and input validation

---

## 💾 Installation & Setup Guide

### 🔧 Requirements

- [XAMPP](https://www.apachefriends.org/) (or any LAMP stack)
- Web browser (e.g., Chrome, Firefox)

### 🛠️ Setup Steps

1. **Download or Clone the Project**

```bash
git clone https://github.com/czarinacuarez/Grading-System.git
```
2. **Move the folder to your htdocs directory**
```bash
C:\xampp\htdocs\Grading-System
```
3. **Import the MySQL database**
- Launch XAMPP and start Apache and MySQL
- Open **phpMyAdmin**
- **Create a database** named **grading**
- Click **Import** and choose **grading.sql** from the project folder

3. **Go to your browser and enter:**
```bash
http://localhost/Grading-System/
```

