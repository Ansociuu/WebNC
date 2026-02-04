# BÁO CÁO DỰ ÁN CUỐI KỲ: THIẾT KẾ WEB NÂNG CAO
## Dự án: Hệ thống Thương mại Điện tử TechStore

### 1. Giới thiệu tổng quan
**TechStore** là một ứng dụng web thương mại điện tử hiện đại, chuyên cung cấp các sản phẩm công nghệ (laptop, điện thoại, linh kiện). Dự án được xây dựng với mục tiêu cung cấp trải nghiệm mua sắm mượt mà, giao diện thân thiện và hiệu năng cao.

*   **Công nghệ sử dụng:** PHP Laravel Framework.
*   **Cơ sở dữ liệu:** MySQL.
*   **Giao diện:** HTML5, Tailwind CSS, DaisyUI, Blade Template.
*   **Kiến trúc:** Model-View-Controller (MVC).

---

### 2. Các chức năng chính của hệ thống

#### 2.1. Quản lý Tài khoản & Xác thực
*   **Đăng ký/Đăng nhập:** Người dùng có thể tạo tài khoản mới và đăng nhập để thực hiện mua sắm.
*   **Quản lý Profile:** Người dùng có thể cập nhật thông tin cá nhân và mật khẩu.
*   **Phân quyền (Roles):** Hệ thống phân chia quyền giữa `User` (Khách hàng) và `Admin` (Quản trị viên).

#### 2.2. Trình diễn Sản phẩm (Shop)
*   **Danh mục sản phẩm:** Phân loại sản phẩm theo từng nhóm (Laptop, Smartphone, v.v.) giúp khách hàng dễ tìm kiếm.
*   **Bộ lọc & Tìm kiếm:** Lọc sản phẩm theo danh mục.
*   **Chi tiết sản phẩm:** Hiển thị thông tin mô tả, giá cả, hình ảnh và tình trạng kho hàng.

#### 2.3. Giỏ hàng & Thanh toán (Cart & Checkout)
*   **Giỏ hàng trực tuyến:** Thêm sản phẩm, cập nhật số lượng hoặc xóa sản phẩm khỏi giỏ hàng.
*   **Quy trình thanh toán:** Thu thập thông tin giao hàng (tên, số điện thoại, địa chỉ) và tạo đơn hàng.
*   **Xác nhận đơn hàng:** Thông báo đặt hàng thành công và lưu lại lịch sử trong cơ sở dữ liệu.

#### 2.4. Tin tức & Sự kiện (News/Blog)
*   **Trang tin tức:** Hiển thị các bài viết mới nhất về công nghệ.
*   **Chi tiết bài viết:** Người dùng có thể đọc nội dung chi tiết.
*   **Bình luận (Comments):** Cho phép người dùng tương tác, để lại ý kiến dưới các bài viết.

#### 2.5. Quản trị hệ thống (Admin Panel) - Dự kiến/Mở rộng
*   Quản lý danh mục, sản phẩm và đơn hàng.
*   Thống kê doanh thu và quản lý người dùng.

---

### 3. Cách thức triển khai (Làm như thế nào?)

#### 3.1. Cấu trúc mã nguồn (MVC)
Hệ thống tuân thủ nghiêm ngặt mô hình MVC của Laravel:
*   **Models:** `User.php`, `Product.php`, `Category.php`, `Order.php`, `News.php`... Định nghĩa các bảng và mối quan hệ (ví dụ: Một Order có nhiều OrderItems).
*   **Views:** Sử dụng `Blade Engine` để tách biệt logic và giao diện. Tích hợp Tailwind CSS để tạo UI cao cấp.
*   **Controllers:** Xử lý logic nghiệp vụ. Ví dụ: `CartController` xử lý logic thêm/sửa/xóa giỏ hàng trong session hoặc database.

#### 3.2. Quản lý Cơ sở dữ liệu
*   Sử dụng **Migrations** để thiết lập cấu trúc bảng đồng bộ.
*   Sử dụng **Eloquent ORM** để tương tác với DB một cách an toàn và tối ưu, tránh SQL Injection.

#### 3.3. Hệ thống Routing
Tất cả các đường dẫn được quản lý tập trung trong thư mục `routes/`, bao gồm:
*   `web.php`: Các route cho người dùng.
*   `auth.php`: Các route xác thực (Login/Register).
*   `news.php`: Các route dành riêng cho mục tin tức.

---

### 4. Hình ảnh minh họa dự án
*(Vui lòng thay thế các ảnh dưới đây bằng ảnh chụp màn hình thực tế từ trình duyệt của bạn)*

#### 4.1. Trang chủ
![Trang chủ]([Chèn đường dẫn ảnh homepage tại đây])
*Mô tả: Giao diện hiện đại với banner nổi bật và các sản phẩm tiêu biểu.*

#### 4.2. Trang cửa hàng (Shop)
![Trang cửa hàng]([Chèn đường dẫn ảnh shop tại đây])
*Mô tả: Danh sách sản phẩm kèm bộ lọc danh mục bên trái.*

#### 4.3. Giỏ hàng
![Giỏ hàng]([Chèn đường dẫn ảnh cart tại đây])
*Mô tả: Nơi người dùng kiểm tra lại các mặt hàng trước khi thanh toán.*

#### 4.4. Trang tin tức
![Trang tin tức]([Chèn đường dẫn ảnh news tại đây])
*Mô tả: Các bài blog công nghệ và phần bình luận của người dùng.*

---

### 5. Kết luận
Dự án **TechStore** đã đáp ứng đầy đủ các yêu cầu của một ứng dụng web thương mại điện tử nâng cao. Hệ thống bao gồm:

*   **Frontend:** Giao diện thân thiện cho khách hàng (Shop, Cart, Checkout, News)
*   **Backend:** API xử lý logic nghiệp vụ (Orders, Users, Products)
*   **Admin Panel:** Bộ công cụ quản lý toàn diện cho quản trị viên

Việc sử dụng Laravel cùng Tailwind CSS & DaisyUI giúp hệ thống có tính bảo mật cao, dễ dàng bảo trì, mở rộng, và mang lại trải nghiệm tốt nhất cho cả người dùng và quản trị viên. Tất cả các chức năng core đã được hoàn thiện theo yêu cầu.

---

### 6. Hướng dẫn chi tiết
Xem file **[ADMIN_GUIDE.md](ADMIN_GUIDE.md)** để có hướng dẫn chi tiết về cách sử dụng Admin Panel.
