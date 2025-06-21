<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# 🖥️ Digital Signage System

This is a **custom digital signage system** built using the Laravel framework. It enables administrators to manage and control media content displayed on screens (TVs) in various departments or zones. It is designed for internal use in organizations like **Algérie Télécom** to distribute information or promotional content effectively.

---

## 📌 Features

- 🎯 **Department & Zone Management**  
  Organize screens by department and zone for easy targeting.

- 📺 **TV Screen Management**  
  Register and configure screens to receive specific media.

- 📂 **Media Library**  
  Upload and categorize images, videos, or dynamic content.

- ⏱️ **Scheduled Display**  
  Control when and where media appears using scheduled rules.

- 📊 **Dashboard & Analytics**  
  Monitor screen usage and content status via a real-time dashboard.

- 🔒 **Role-based Access Control**  
  Admins and supervisors have different permissions and visibility.

---

## ⚙️ Tech Stack

- **Backend**: Laravel 10+
- **Admin Panel**: Filament PHP
- **Database**: MySQL / MariaDB
- **Frontend**: Blade, Livewire (or Inertia depending on your setup)
- **TV Client**: Custom HTML/JS frontend that polls assigned content

---

## 🚀 Installation

```bash
git clone https://github.com/yourusername/digital-signage-system.git
cd digital-signage-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
