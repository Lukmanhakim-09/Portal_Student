# 🎓 Portal Student - KALLA INSTITUTE

Sistem Informasi Akademik (SIA) untuk mahasiswa KALLA INSTITUTE dengan fitur dashboard mahasiswa, pembayaran, notifikasi, dan KRS (Kartu Rencana Studi).

## 📋 Fitur Utama

### 🔐 Authentication (Laravel Breeze)
- Login/Registrasi mahasiswa
- Role-based access (Student/Admin)
- Password reset functionality

### 📊 Dashboard Mahasiswa
- **Ringkasan Tagihan**: Total tagihan dan status pembayaran
- **Status Pembayaran**: Real-time payment status
- **Notifikasi**: Sistem notifikasi dengan mark as read
- **Tabel KRS**: Kartu Rencana Studi dengan detail dan silabus

### 💳 Sistem Pembayaran
- Simulasi pembayaran tagihan
- Status: PENDING → PAID
- Validasi pembayaran untuk KRS

### 👤 Profil Mahasiswa
- Edit profil dasar
- Update informasi personal

### 🛠️ Admin Panel
- Dashboard admin dengan statistik
- Monitoring mahasiswa
- Data pembayaran dan KRS

## 🗄️ Skema Database

### Users Table
```sql
users(id, name, email, password, role[student/admin], payment_status)
```

### Payments Table
```sql
payments(id, user_id, amount, due_date, status[PENDING/PAID], paid_at)
```

### Notifications Table
```sql
notifications(id, user_id, title, body, read_at)
```

### KRS Enrollments Table
```sql
krs_enrollments(id, user_id, kode_mk, nama_mk, sks, kelas, hari, mulai, selesai)
```

## 🚀 Instalasi & Setup

### Prerequisites
- PHP 8.1+
- Composer
- MySQL/MariaDB
- XAMPP/WAMP/LAMP

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/Lukmanhakim-09/Portal_Student.git
cd Portal_Student/my-project
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Configuration**
```bash
# Edit .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_student
DB_USERNAME=root
DB_PASSWORD=
```

5. **Database Migration & Seeding**
```bash
php artisan migrate
php artisan db:seed
```

6. **Build Assets**
```bash
npm run dev
```

7. **Start Server**
```bash
php artisan serve
```

## 👥 Akun Default

### Admin
- **Email**: `admin@admin.com`
- **Password**: `password`
- **Role**: Admin

### Student (Test)
- **Email**: `test@example.com`
- **Password**: `password`
- **Role**: Student

## 🎯 Fitur Wajib (Fungsional)

### ✅ Auth Laravel Breeze
- Login/registrasi mahasiswa
- Password reset
- Role-based authentication

### ✅ Dashboard Mahasiswa
- Ringkasan tagihan
- Status pembayaran
- Notifikasi belum dibaca
- Tabel KRS dummy

### ✅ Pembayaran
- Simulasi bayar
- Ubah status Lunas
- Validasi untuk KRS

### ✅ Profil
- Edit profil dasar
- Update informasi

### ✅ Admin Panel
- Dashboard admin
- Monitoring mahasiswa
- Statistik pembayaran dan KRS

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Asset Build**: Vite

## 📁 Struktur File Penting

```
my-project/
├── app/
│   ├── Http/Controllers/
│   │   ├── DashboardController.php
│   │   ├── PaymentController.php
│   │   ├── KRSController.php
│   │   ├── AdminController.php
│   │   └── Auth/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Payment.php
│   │   ├── Notification.php
│   │   └── KRSEnrollment.php
│   ├── Observers/
│   │   └── UserObserver.php
│   └── Http/Middleware/
│       └── AdminMiddleware.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── dashboard.blade.php
│   ├── admin/
│   ├── krs/
│   └── auth/
└── routes/
    └── web.php
```

## 🎨 Screenshot Dashboard

### Student Dashboard
- Header dengan gradient hijau
- Ringkasan tagihan dan pembayaran
- Notifikasi dengan status read/unread
- Tabel KRS dengan detail dan silabus
- Admin Panel button (untuk admin)

### Admin Dashboard
- Clean design dengan background gray
- Statistik: Total Mahasiswa, Sudah Membayar, Sudah Ajukan KRS
- Progress bars dan tabel ringkasan
- Monitoring data mahasiswa

## 🔧 Arsitektur Singkat

### MVC Pattern
- **Model**: User, Payment, Notification, KRSEnrollment
- **View**: Blade templates dengan Tailwind CSS
- **Controller**: DashboardController, PaymentController, KRSController, AdminController

### Authentication Flow
1. User login → Role check → Redirect to appropriate dashboard
2. Admin → Admin Panel
3. Student → Student Dashboard

### Payment Flow
1. New user registration → Auto-create 3 payment records
2. Payment simulation → Update status to PAID
3. KRS enrollment → Check payment threshold (50%)

### Observer Pattern
- UserObserver → Auto-create payments and notifications for new users

## 📧 Contact

**Repository**: https://github.com/Lukmanhakim-09/Portal_Student.git

**Email**: ict@kallainstitute.ac.id

---

**Developed for KALLA INSTITUTE** 🎓
