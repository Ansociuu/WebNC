@extends('layouts.myapp')

@section('title', 'Hỗ Trợ Khách Hàng - TechStore')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-white">
    <!-- Hero Section -->
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center space-y-6">
            <h1 class="text-5xl lg:text-6xl font-black text-slate-900">
                Trung Tâm <span class="text-indigo-600">Hỗ Trợ</span>
            </h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Chúng tôi luôn sẵn sàng giúp bạn giải quyết mọi vấn đề và thắc mắc
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto space-y-20">
            <!-- Quick Links -->
            <div class="grid md:grid-cols-3 gap-8">
                <a href="#faq" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg hover:border-indigo-200 transition-all">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Câu Hỏi Thường Gặp</h3>
                    <p class="text-slate-600">Tìm câu trả lời cho những câu hỏi phổ biến nhất</p>
                </a>

                <a href="#policies" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg hover:border-indigo-200 transition-all">
                    <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-purple-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Chính Sách & Bảo Hành</h3>
                    <p class="text-slate-600">Thông tin chi tiết về chính sách bảo hành và đổi trả</p>
                </a>

                <a href="#contact" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg hover:border-indigo-200 transition-all">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-emerald-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Liên Hệ Chúng Tôi</h3>
                    <p class="text-slate-600">Gọi hoặc email cho đội hỗ trợ của chúng tôi</p>
                </a>
            </div>

            <!-- FAQ Section -->
            <div id="faq" class="space-y-8">
                <div class="text-center space-y-4 mb-12">
                    <h2 class="text-4xl font-bold text-slate-900">Câu Hỏi Thường Gặp</h2>
                </div>

                <div class="space-y-4 max-w-4xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Làm cách nào để theo dõi đơn hàng của tôi?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                Sau khi đặt hàng, bạn sẽ nhận được email xác nhận với số theo dõi. Bạn có thể nhập số này vào trang web của chúng tôi hoặc website nhà vận chuyển để theo dõi vị trí gói hàng của bạn. Ngoài ra, bạn cũng có thể kiểm tra trong phần "Đơn hàng của tôi" trên tài khoản TechStore.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Tôi có thể hủy hoặc thay đổi đơn hàng không?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                Bạn có thể hủy hoặc thay đổi đơn hàng trong vòng 24 giờ sau khi đặt hàng, miễn là đơn hàng chưa được gửi đi. Hãy liên hệ với chúng tôi ngay qua email hoặc điện thoại để được hỗ trợ kịp thời.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Chính sách đổi trả của TechStore là gì?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                TechStore cung cấp chính sách đổi trả trong vòng 30 ngày kể từ ngày nhận hàng nếu sản phẩm có lỗi hoặc không đúng như mô tả. Sản phẩm phải còn nguyên vẹn, chưa sử dụng hoặc sử dụng một cách thận trọng. Vui lòng liên hệ với chúng tôi để biết thêm chi tiết.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Có những phương thức thanh toán nào available?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                TechStore hỗ trợ nhiều phương thức thanh toán bao gồm:
                                <ul class="list-disc list-inside space-y-2 mt-3">
                                    <li>Thanh toán bằng thẻ tín dụng/ghi nợ</li>
                                    <li>Ví điện tử (Momo, ZaloPay, v.v.)</li>
                                    <li>Chuyển khoản ngân hàng</li>
                                    <li>Trả tiền khi nhận hàng (COD)</li>
                                </ul>
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Chi phí vận chuyển được tính như thế nào?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                Chi phí vận chuyển phụ thuộc vào địa điểm giao hàng và trọng lượng của sản phẩm. Bạn sẽ thấy chi phí vận chuyển cụ thể trước khi thanh toán. TechStore cung cấp miễn phí vận chuyển cho các đơn hàng trên 1,000,000₫ tại các khu vực chính.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="collapse collapse-plus bg-white border border-slate-200 rounded-xl">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-xl font-bold text-slate-900">
                            Làm cách nào để nhận được các ưu đãi và khuyến mãi?
                        </div>
                        <div class="collapse-content">
                            <p class="text-slate-600 pt-4">
                                Bạn có thể đăng ký bản tin email từ TechStore để nhận các ưu đãi độc quyền, mã giảm giá và thông tin sản phẩm mới. Ngoài ra, hãy theo dõi các trang mạng xã hội của chúng tôi để cập nhật các chương trình khuyến mãi mới nhất.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Policies Section -->
            <div id="policies" class="space-y-8">
                <div class="text-center space-y-4 mb-12">
                    <h2 class="text-4xl font-bold text-slate-900">Chính Sách & Bảo Hành</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Warranty Policy -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Bảo Hành Sản Phẩm</h3>
                        <ul class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Tất cả sản phẩm đều được bảo hành 12 tháng từ ngày mua</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Bảo hành bao gồm các lỗi do nhà sản xuất, không bao gồm hư hỏng do người dùng gây ra</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Để được bảo hành, vui lòng cung cấp hóa đơn mua hàng hoặc email xác nhận</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Thời gian xử lý bảo hành: 7-15 ngày làm việc</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Return & Exchange -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Đổi Trả & Hoàn Tiền</h3>
                        <ul class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Đổi trả miễn phí trong vòng 30 ngày nếu sản phẩm lỗi</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Sản phẩm phải còn nguyên vẹn, chưa sử dụng hoặc chưa tháo dỡ</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Hoàn tiền sẽ được xử lý trong vòng 5-7 ngày làm việc</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Chi phí vận chuyển hoàn trả do khách hàng chịu</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Shipping Policy -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Vận Chuyển & Giao Nhận</h3>
                        <ul class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Giao hàng toàn quốc trong vòng 2-5 ngày làm việc</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Miễn phí vận chuyển cho đơn hàng trên 1,000,000₫</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Hỗ trợ theo dõi gói hàng real-time</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Đóng gói cẩn thận để bảo vệ sản phẩm</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Security Policy -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Bảo Mật & Quyền Riêng Tư</h3>
                        <ul class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Dữ liệu khách hàng được mã hóa SSL 256-bit</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Không chia sẻ thông tin cá nhân của bạn cho bên thứ ba</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Thanh toán an toàn qua cổng thanh toán đáng tin cậy</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-indigo-600 font-bold">•</span>
                                <span>Tuân thủ các tiêu chuẩn bảo vệ dữ liệu quốc tế</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div id="contact" class="space-y-8">
                <div class="text-center space-y-4 mb-12">
                    <h2 class="text-4xl font-bold text-slate-900">Liên Hệ Chúng Tôi</h2>
                    <p class="text-lg text-slate-600">Đôi khi bạn cần nói chuyện trực tiếp với ai đó. Chúng tôi ở đây để giúp.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto mb-12">
                    <!-- Phone -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 text-center">
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Điện Thoại</h3>
                        <p class="text-slate-600 mb-4">Gọi cho chúng tôi ngay tại:</p>
                        <a href="tel:+841234567890" class="text-indigo-600 font-bold hover:underline">(+84) 123 456 7890</a>
                        <p class="text-sm text-slate-500 mt-4">Thứ Hai - Chủ Nhật: 8:00 - 22:00</p>
                    </div>

                    <!-- Email -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 text-center">
                        <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Email</h3>
                        <p class="text-slate-600 mb-4">Gửi email cho chúng tôi tại:</p>
                        <a href="mailto:support@techstore.vn" class="text-indigo-600 font-bold hover:underline">support@techstore.vn</a>
                        <p class="text-sm text-slate-500 mt-4">Trả lời trong vòng 24 giờ</p>
                    </div>

                    <!-- Live Chat -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 text-center">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Live Chat</h3>
                        <p class="text-slate-600 mb-4">Trò chuyện trực tiếp với chúng tôi:</p>
                        <button class="text-indigo-600 font-bold hover:underline">Bắt đầu cuộc trò chuyện</button>
                        <p class="text-sm text-slate-500 mt-4">Có sẵn từ 8:00 - 22:00</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Gửi Thư Cho Chúng Tôi</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Tên của bạn</label>
                            <input type="text" class="input input-bordered w-full" placeholder="Nhập tên của bạn">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                            <input type="email" class="input input-bordered w-full" placeholder="your@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Chủ đề</label>
                            <input type="text" class="input input-bordered w-full" placeholder="Chủ đề của tin nhắn">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nội dung</label>
                            <textarea class="textarea textarea-bordered w-full" rows="5" placeholder="Nội dung tin nhắn của bạn"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Gửi Tin Nhắn</button>
                    </form>
                </div>
            </div>

            <!-- Response Times -->
            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-3xl p-8 md:p-12 max-w-4xl mx-auto">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">Thời Gian Phản Hồi</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <div class="text-3xl font-black text-indigo-600 mb-2">Ngay Lập Tức</div>
                        <p class="text-slate-600">Live Chat</p>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-indigo-600 mb-2">Dưới 1 Giờ</div>
                        <p class="text-slate-600">Điện Thoại</p>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-indigo-600 mb-2">24 Giờ</div>
                        <p class="text-slate-600">Email</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
