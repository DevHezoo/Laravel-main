# Task Manager (Laravel 11)

A simple task management application built with **Laravel 11** and **PHP 8.3**.  
It supports **CRUD** operations, **drag‑and‑drop** reordering (with automatic priority updates), and an optional **project** filter (bonus).

---

## ✨ Features

- ✅ Create, edit, and delete tasks
- ✅ Each task has: **name**, **priority** (auto‑managed), **timestamps**
- ✅ Drag‑and‑drop reordering – priority updates instantly via AJAX (no page reload)
- ✅ Filter tasks by **project** (dropdown)
- ✅ Priorities are maintained **per project group** – when you reorder within a filtered project, only that project’s tasks are affected
- ✅ Clean, readable code following Laravel conventions
- ✅ MySQL database with `utf8mb4_unicode_ci` collation (supports full Unicode)

---

## 🧰 Requirements

- **PHP** ≥ 8.3
- **Composer**
- **MySQL** (or any database supported by Laravel)
- **Web server** (e.g., Apache, Nginx, or `php artisan serve`)

---

## 🚀 Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/devia2025/Laravel-main/tree/main/Projects/task-manager
cd task-manager