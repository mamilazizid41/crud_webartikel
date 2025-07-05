
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
- ✅ Pagination (articles & dashboard)
- ✅ Draft/publish article support

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
   git clone https://github.com/mamilazizid41/crud_webartikel.git
   cd crud_webartikel
````

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Copy and edit the environment file**

   ```bash
   cp env .env
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
