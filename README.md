# 🚀 TechStore - Hệ thống Thương mại Điện tử Đồ công nghệ

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38bdf8.svg)](https://tailwindcss.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## 📌 Tổng quan dự án
**TechStore** là một nền tảng thương mại điện tử hiện đại được xây dựng trên framework **Laravel 11**, tập trung vào trải nghiệm người dùng (UX) và giao diện cao cấp (Premium UI). Dự án hỗ trợ đầy đủ quy trình từ quản lý sản phẩm, giỏ hàng, đặt hàng đến chăm sóc khách hàng thông qua hệ thống ChatBot thông minh.

---

## ✨ Tính năng nổi bật

### 🛒 Trải nghiệm mua sắm (Storefront)
- **Giao diện hiện đại**: Sử dụng Tailwind CSS và DaisyUI với phong cách Glassmorphism, Gradients sống động.
- **AJAX Shopping Cart**: Thêm sản phẩm vào giỏ hàng ngay lập tức với hiệu ứng Loading và Toast notification, không cần tải lại trang.
- **Smart Search & Filter**: Tìm kiếm sản phẩm theo tên và phân loại theo danh mục.
- **Lịch sử đơn hàng**: Người dùng có thể theo dõi tiến độ đơn hàng và xem lại lịch sử mua sắm.

### 🤖 Hệ thống ChatBot & Hỗ trợ
- **AI-Powered ChatBot**: Trả lời tự động dựa trên từ khóa (Keyword Matching) hỗ trợ khách hàng 24/7.
- **Hybrid Support**: Tự động chuyển đổi từ Bot sang Admin khi có nhân viên hỗ trợ online.
- **Định danh người dùng**: Hệ thống liên kết nội dung chat với tài khoản người dùng, lưu giữ lịch sử chat dài hạn.

### ⚙️ Quản trị toàn diện (Admin Panel)
- **Dashboard thông minh**: Thống kê nhanh về doanh thu, đơn hàng và người dùng.
- **Quản lý sản phẩm**: Hỗ trợ 2 phương thức xử lý ảnh (Tải lên trực tiếp hoặc qua URL bên ngoài). 
- **Quản lý Đơn hàng & Tin nhắn**: Xử lý đơn hàng của khách và trả lời chat trực tiếp từ trang quản trị.

### 📧 Thông báo & Bảo mật
- **Email Order Success**: Gửi email xác nhận đơn hàng chuyên nghiệp với đầy đủ thông tin chi tiết.
- **Xác thực an toàn**: Hệ thống đăng nhập, đăng ký và phân quyền (Admin/User) chặt chẽ.

---

## 🛠 Công nghệ sử dụng
- **Backend**: Laravel 11, PHP 8.2+, MySQL.
- **Frontend**: Blade Template, Tailwind CSS, DaisyUI, JavaScript (ES6+), AJAX (Fetch API).
- **Tooling**: Composer, NPM, Vite.

---

## 📂 Cấu trúc dự án chính
```text
TechStore/
├── app/
│   ├── Http/Controllers/   # Xử lý logic nghiệp vụ (Cart, Chat, Shop...)
│   └── Models/             # Quản lý Database (Product, Order, Chat...)
├── database/
│   └── migrations/         # Cấu trúc bảng (Products, Orders, Chats...)
├── resources/
│   ├── views/              # Giao diện Blade (Admin, Shop, Components...)
│   └── js/                 # Logic AJAX và tương tác UI
├── routes/
│   └── web.php             # Định nghĩa các tuyến của ứng dụng
└── BAO_CAO_DU_AN.md        # Báo cáo chi tiết đồ án (Vietnamese)
```

---

## 🚀 Cài đặt & Sử dụng

1. **Clone dự án**:
   ```bash
   git clone https://github.com/Ansociuu/WebNC.git
   cd WebNC
   ```

2. **Cấu hình môi trường**:
   - Copy file `.env.example` thành `.env`.
   - Cập nhật thông tin `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
   - Cấu hình Mail (SMTP) nếu muốn dùng tính năng gửi email đơn hàng.

3. **Cài đặt thư viện**:
   ```bash
   composer install
   npm install && npm run dev
   ```

4. **Khởi tạo cơ sở dữ liệu**:
   ```bash
   php artisan key:generate
   php artisan migrate
   php artisan db:seed
   ```

5. **Chạy server**:
   ```bash
   php artisan serve
   ```

---

## 📝 Báo cáo đồ án
Chi tiết báo cáo 5 chương (Tổng quan, Phân tích thiết kế, Cài đặt, Đánh giá) có thể xem tại: [BAO_CAO_DU_AN.md](BAO_CAO_DU_AN.md)

---
© 2026 TechStore Project Team.
