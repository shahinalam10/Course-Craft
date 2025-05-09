# 🎯 Course Craft - Laravel Course Builder

**Course Craft** is a dynamic Laravel 12 application that allows users to create structured online courses with multiple modules and nested contents. Designed with usability and scalability in mind, this project showcases professional CRUD functionality and interactive UI using Bootstrap 5.

---

## 🚀 Features

- ✅ Create courses with:
  - Title, Level, Category, Price, Summary, Feature Video, Feature Image
- ➕ Add multiple **modules** per course
- 🧩 Add multiple **contents** under each module (with video URL, source, length)
- ✅ Real-time **frontend validation** (Bootstrap 5)
- 🔄 Dynamic **accordion UI** for modules & contents (collapsible + removable)
- 📂 Feature image upload (JPG/PNG)
- 🔍 Course search by title
- 🛠️ Full **CRUD**: Create, View, Edit, Delete
- 📋 Course list with pagination
- 🎯 Clean & modern UI (professional design touch)

---

## 📸 Screenshots

> Screenshots are available in the `/screenshots` folder.

| Create Course | Course List |
|---------------|-------------|
| ![Create](screenshots/create-form.png) | ![List](screenshots/course-list.png) |

---

## ⚙️ Project Setup Instructions

### 📦 Requirements

- PHP 8.2+
- Composer
- Laravel 12
- MySQL or compatible DB
- Node.js (optional, for asset compilation)

### 📥 Installation
    git clone https://github.com/your-username/course-craft.git
    cd course-craft
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve

### for npm-based assets
    npm install
    npm run dev
    npm run build
    
## 📁 Folder Structure Highlights
    resources/views/
    ├── layouts/
    │   └── master.blade.php
    ├── courses/
    │   ├── create.blade.php
    │   ├── index.blade.php
    │   ├── show.blade.php
    │   └── edit.blade.php
    ├── home.blade.php
    
    app/
    ├── Models/
    │   ├── Course.php
    │   ├── Module.php
    │   └── Content.php
    
    app/Http/Controllers/
    ├── CourseController.php

## 🧠 Learning Outcome
- ✔️ Nested form handling in Laravel with array inputs
- ✔️ Real-time field validation using Bootstrap classes and JS
- ✔️ Dynamic accordion creation and DOM manipulation via JavaScript
- ✔️ File upload handling with validation and storage
- ✔️ Clean Laravel MVC structure and route organization
- ✔️ Fully functional CRUD with pagination and search
  
# 🙏 Acknowledgements
** This project was developed as part of a Laravel Job Interview Task.
I've put my full effort into making this application professional, complete, and beyond the given requirements (including bonus features like full CRUD, search, and real-time validation).
Thanks for taking the time to review Course Craft!
