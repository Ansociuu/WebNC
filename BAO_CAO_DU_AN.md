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

#### 2.5. Hệ thống Chat Hỗ trợ (Live Chat)
*   **Widget Chat:** Tích hợp ở mọi trang, cho phép khách hàng bắt đầu cuộc trò chuyện ngay cả khi chưa đăng nhập.
*   **Bot tự động:** Có khả năng trả lời các câu hỏi thường gặp (giờ mở cửa, phí ship, bảo hành) ngay lập tức.
*   **Quản trị Chat:** Admin có trang riêng để quản lý các cuộc hội thoại và phản hồi khách hàng trong thời gian thực.

#### 2.6. Lịch sử đơn hàng (Order History)
*   **Quản lý giao dịch:** Người dùng có thể xem lại toàn bộ các đơn hàng đã đặt, trạng thái (Chờ xử lý, Đã thanh toán, Đã hủy).
*   **Chi tiết đơn hàng:** Xem lại danh sách sản phẩm, địa chỉ nhận hàng và tổng tiền cho từng giao dịch cũ.

#### 2.7. Quản trị hệ thống Toàn diện (Admin Panel)
Hệ thống Admin đã được hoàn thiện đầy đủ các module:
*   **Sản phẩm:** Quản lý kho, giá cả, và hỗ trợ gán linh hoạt cả **Upload ảnh** lẫn **Dán URL ảnh** từ bên ngoài.
*   **Đơn hàng:** Theo dõi và cập nhật trạng thái đơn hàng của khách.
*   **Thành viên & Tin tức:** Quản trị nội dung và người dùng hệ thống.
*   **Hỗ trợ:** Phản hồi tin nhắn chat từ khách hàng.

---

### 3. Cách thức triển khai (Làm như thế nào?)

#### 3.1. Cấu trúc mã nguồn (MVC)
Hệ thống tuân thủ nghiêm ngặt mô hình MVC của Laravel:
*   **Models:** `User.php`, `Product.php`, `Category.php`, `Order.php`, `News.php`... Định nghĩa các bảng và mối quan hệ (ví dụ: Một Order có nhiều OrderItems).
*   **Views:** Sử dụng `Blade Engine` để tách biệt logic và giao diện. Tích hợp Tailwind CSS để tạo UI cao cấp.
*   **Controllers:** Xử lý logic nghiệp vụ. Ví dụ: `CartController` xử lý logic thêm/sửa/xóa giỏ hàng. Hỗ trợ **AJAX Cart** để người dùng thêm vào giỏ mà không bị tải lại trang.
*   **Khác:** Tích hợp hệ thống Email (OrderSuccess), xử lý ảnh linh hoạt (Local/Cloud).

#### 3.2. Quản lý Cơ sở dữ liệu
*   Sử dụng **Migrations** để thiết lập cấu trúc bảng đồng bộ.
*   Sử dụng **Eloquent ORM** để tương tác với DB một cách an toàn và tối ưu, tránh SQL Injection.

#### 3.3. Hệ thống Routing
Tất cả các đường dẫn được quản lý tập trung trong thư mục `routes/`, bao gồm:
*   `web.php`: Các route cho người dùng.
*   `auth.php`: Các route xác thực (Login/Register).
*   `news.php`: Các route dành riêng cho mục tin tức.

---

### 4. Phân tích mã nguồn chi tiết

#### 4.1. Mô hình Quan hệ dữ liệu (Eloquent Relationships)
Dự án sử dụng tối đa sức mạnh của Eloquent ORM để liên kết các bảng dữ liệu, giúp code ngắn gọn và dễ bảo trì.
*   **1-n (Một - Nhiều):**
    *   `Category` -> `Product`: Một danh mục có nhiều sản phẩm.
    *   `News` -> `Comment`: Một bài tin tức có nhiều bình luận.
    *   `Order` -> `OrderItem`: Một đơn hàng có nhiều chi tiết sản phẩm.
*   **Mã nguồn minh họa (Product.php):**
    ```php
    public function category() {
        return $this->belongsTo(Category::class);
    }
    ```

#### 4.2. Chức năng Shop & Bộ lọc nâng cao
*   **Controller:** `ShopController.php`
*   **Logic xử lý đa điều kiện:**
    Sử dụng *Query Builder* để xây dựng câu truy vấn động. Hệ thống kiểm tra xem người dùng có chọn danh mục hay không (`$request->has('category')`). Nếu có, hệ thống sẽ thêm điều kiện `where` vào câu truy vấn trước khi lấy dữ liệu.
*   **Tối ưu hiệu năng:**
    Sử dụng `paginate(12)` thay vì `get()`. Điều này cực kỳ quan trọng khi database có hàng nghìn sản phẩm, giúp trang web load nhanh hơn bằng cách chỉ tải 12 sản phẩm mỗi lần.

#### 4.3. Chức năng Giỏ hàng (Shopping Cart Session)
*   **Controller:** `CartController.php`
*   **Logic thông minh:**
    Khi người dùng thêm sản phẩm:
    1.  Hệ thống kiểm tra trong Database bảng `carts` xem `user_id` và `product_id` đã tồn tại chưa.
    2.  **Nếu đã có:** Cập nhật số lượng (`quantity + 1`) chứ không tạo dòng mới.
    3.  **Nếu chưa có:** Tạo bản ghi mới.
    Đây là cách xử lý chuyên nghiệp giúp tránh dư thừa dữ liệu.

#### 4.4. Hệ thống Tin tức & Bình luận (News & Comments)
Đây là tính năng tăng tính tương tác cho Website.
*   **Phân quyền (RBAC - Role Based Access Control):**
    Trong `NewsController`, chức năng xóa tin tức được bảo vệ nghiêm ngặt:
    ```php
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Bạn không có quyền xóa tin tức.');
    }
    ```
    Chỉ tài khoản có quyền `admin` mới thực hiện được, ngăn chặn hacker hoặc người dùng thường phá hoại.
*   **Kiểm soát dữ liệu đầu vào (Validation):**
    Khi comment, hệ thống bắt buộc nội dung không được để trống thông qua `$request->validate()`.
*   **Hiển thị:**
    Bình luận được sắp xếp theo thời gian mới nhất (`latest()`) để người đọc dễ theo dõi.

#### 4.5. Quy trình Thanh toán an toàn (Checkout Transaction)
Đây là chức năng phức tạp nhất và quan trọng nhất của hệ thống thương mại điện tử.
*   **Database Transaction:**
    Sử dụng `DB::beginTransaction()` và `DB::commit()` trong `CheckoutController`.
    *   **Mục đích:** Đảm bảo tính toàn vẹn dữ liệu.
    *   **Hoạt động:** Hệ thống thực hiện 3 bước: (1) Tạo đơn hàng -> (2) Tạo chi tiết đơn hàng -> (3) Xóa giỏ hàng. Nếu bất kỳ bước nào bị lỗi, lệnh `DB::rollBack()` sẽ hủy toàn bộ quá trình, đảm bảo không bao giờ có đơn hàng lỗi (ví dụ: có đơn hàng nhưng không có sản phẩm bên trong).
    ```php
    try {
        DB::beginTransaction();
        // Tạo Order...
        // Tạo OrderItem...
        // Xóa Cart...
        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack(); // Hoàn tác nếu lỗi
    }
    ```

#### 4.6. Quản lý Tài khoản & Bảo mật (User Profile)
*   **Controller:** `ProfileController.php`
*   **Cập nhật thông tin:** Cho phép người dùng đổi tên và email. Nếu đổi email, hệ thống sẽ reset trạng thái `email_verified_at` để yêu cầu xác thực lại (Logic bảo mật chuẩn).
*   **Xóa tài khoản:** Khi người dùng xóa tài khoản, hệ thống tự động đăng xuất (`Auth::logout()`), hủy session (`session()->invalidate()`) và xóa dữ liệu khỏi database.

#### 4.7. Quản lý Database (Migrations)
Sử dụng Migrations để định nghĩa cấu trúc:
*   `users`: Lưu thông tin đăng nhập và quyền hạn.
*   `products`, `categories`: Lưu trữ hàng hóa.
*   `orders`, `order_items`: Lưu trữ lịch sử giao dịch.
Việc dùng Migration giúp nhóm phát triển đồng bộ database dễ dàng mà không cần copy file SQL thủ công.

---

### 5. Hình ảnh minh họa dự án
*(Vui lòng thay thế các ảnh dưới đây bằng ảnh chụp màn hình thực tế từ trình duyệt của bạn)*

#### 5.1. Trang chủ
![Trang chủ]([Chèn đường dẫn ảnh homepage tại đây])
*Mô tả: Giao diện hiện đại với banner nổi bật và các sản phẩm tiêu biểu.*

#### 5.2. Trang cửa hàng (Shop)
![Trang cửa hàng]([Chèn đường dẫn ảnh shop tại đây])
*Mô tả: Danh sách sản phẩm kèm bộ lọc danh mục bên trái.*

#### 5.3. Giỏ hàng
![Giỏ hàng]([Chèn đường dẫn ảnh cart tại đây])
*Mô tả: Nơi người dùng kiểm tra lại các mặt hàng trước khi thanh toán.*

#### 5.4. Trang tin tức
![Trang tin tức]([Chèn đường dẫn ảnh news tại đây])
*Mô tả: Các bài blog công nghệ và phần bình luận của người dùng.*

---

---

### 6. Kết luận
Dự án **TechStore** đã đáp ứng đầy đủ và vượt mong đợi các yêu cầu của một ứng dụng web nâng cao. Việc sử dụng Laravel giúp hệ thống có tính bảo mật cao, dễ dàng bảo trì. Các tính năng như AJAX Cart, ChatBot, và hỗ trợ ảnh URL giúp dự án mang tính thực tiễn cao, sẵn sàng cho việc triển khai thực tế.
