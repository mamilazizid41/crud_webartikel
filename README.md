Sure! Here's the full `README.md` file as code so you can copy and paste it directly into your project:

````markdown
# 📰 CodeIgniter 4 Articles Website

A simple CMS-style web application built with **CodeIgniter 4** that allows users to register, log in, and manage articles with feedback support. Includes a public-facing page, admin dashboard, authentication, search, pagination, and Bootstrap styling.

---

## 🚀 Features

- ✅ User Registration & Login (with session auth)
- ✅ Create / Read / Update / Delete (CRUD) Articles
- ✅ Public articles list with `/read/{id}` detail pages
- ✅ Feedback form for each article (with name & email)
- ✅ Admin Dashboard with article management
- ✅ Feedback management page (admin only)
- ✅ Bootstrap 5 responsive layout with FontAwesome
- ✅ Rich-text editor (Summernote)
- ✅ SweetAlert confirmation & success messages
- ✅ Sidebar shows 3 latest articles
- ✅ Search and pagination (articles & dashboard)
- ✅ Draft/publish article support
- ✅ Role-based UI (sidebar hidden on login/register)

---

## 📦 Requirements

- PHP 8.0+
- MySQL or MariaDB
- Composer
- CodeIgniter 4 (latest stable)

---

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/ci4-articles.git
   cd ci4-articles
````

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Copy and edit the environment file**

   ```bash
   cp .env.example .env
   php spark key:generate
   ```

4. **Set your database credentials** in `.env`:

   ```
   database.default.hostname = localhost
   database.default.database = your_db
   database.default.username = root
   database.default.password = root
   database.default.DBDriver = MySQLi
   ```

5. **Run migrations**

   ```bash
   php spark migrate
   ```

6. **Serve the app**

   ```bash
   php spark serve
   ```

   Visit: [http://localhost:8080](http://localhost:8080)

---


## 🧱 Folder Structure (Key Parts)

```
app/
├── Controllers/
│   ├── ArticleController.php
│   ├── AuthController.php
│   └── FeedbackController.php
├── Models/
│   ├── ArticleModel.php
│   ├── UserModel.php
│   └── FeedbackModel.php
├── Views/
│   ├── articles/
│   ├── auth/
│   ├── feedback/
│   └── layouts/
├── Cells/
│   └── LatestArticles.php
└── Database/
    └── Migrations/
