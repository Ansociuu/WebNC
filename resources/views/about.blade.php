@extends('layouts.myapp')

@section('title', 'Giới thiệu - TechStore')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-white">
    <!-- Hero Section -->
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center space-y-6">
            <h1 class="text-5xl lg:text-6xl font-black text-slate-900">
                Chào mừng đến với <span class="text-indigo-600">TechStore</span>
            </h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Điểm đến tin cậy cho những sản phẩm công nghệ hàng đầu với giá tốt nhất và dịch vụ tuyệt vời
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto space-y-20">
            <!-- About Section -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-slate-900">Về TechStore</h2>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        <strong>TechStore</strong> là một nền tảng thương mại điện tử hiện đại chuyên cung cấp các sản phẩm công nghệ chất lượng cao. Chúng tôi cam kết mang đến cho khách hàng những chiếc laptop, điện thoại, linh kiện máy tính tốt nhất với giá cạnh tranh nhất trên thị trường.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Với hơn một thập kỷ kinh nghiệm trong lĩnh vực công nghệ, TechStore đã trở thành cửa hàng tin cậy của hàng nghìn khách hàng. Chúng tôi không chỉ bán sản phẩm, mà còn cung cấp những giải pháp công nghệ tốt nhất cho nhu cầu của bạn.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-8 rounded-3xl">
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><polygon points="12 2 15.09 10.26 24 10.5 18 16.6 20.29 25.5 12 21.77 3.71 25.5 6 16.6 0 10.5 8.91 10.26 12 2"/></polygon></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900">Chất lượng Hàng Đầu</h3>
                                <p class="text-slate-600">Tất cả sản phẩm đều được kiểm tra kỹ lưỡng trước khi giao tới tay khách hàng</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></polygon></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900">Giao Hàng Nhanh</h3>
                                <p class="text-slate-600">Vận chuyển toàn quốc với tốc độ nhanh nhất và chi phí hợp lý</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headset"><path d="M3 10h3a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2Z"/><path d="M21 10h-3a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Z"/><path d="M9 9a6 6 0 0 1 6 0"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900">Hỗ Trợ 24/7</h3>
                                <p class="text-slate-600">Đội ngũ hỗ trợ khách hàng sẵn sàng giúp bạn mọi lúc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="space-y-12">
                <div class="text-center space-y-4">
                    <h2 class="text-4xl font-bold text-slate-900">Giá Trị Cốt Lõi Của Chúng Tôi</h2>
                    <p class="text-lg text-slate-600">Những nguyên tắc mà chúng tôi luôn tuân thủ</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Value 1 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Tin Cậy & Minh Bạch</h3>
                        <p class="text-slate-600">Chúng tôi cam kết hoàn toàn minh bạch trong mọi giao dịch và luôn đặt lợi ích khách hàng lên hàng đầu</p>
                    </div>

                    <!-- Value 2 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb"><circle cx="12" cy="13" r="8"/><path d="M12 17v6"/><path d="M8 20h8"/><path d="M9 8C10 5.5 12.5 2 15 2"/><path d="M15 8C14 5.5 11.5 2 9 2"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Sáng Tạo & Phát Triển</h3>
                        <p class="text-slate-600">Chúng tôi luôn tìm cách cải tiến dịch vụ, cập nhật công nghệ mới nhất để phục vụ bạn tốt hơn</p>
                    </div>

                    <!-- Value 3 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Cộng Đồng Khách Hàng</h3>
                        <p class="text-slate-600">Chúng tôi xem khách hàng là một phần của gia đình TechStore, luôn lắng nghe và cải tiến dựa trên phản hồi</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-3xl p-12 text-white">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-5xl font-black mb-2">50K+</div>
                        <p class="text-indigo-100 font-medium">Khách Hàng Hài Lòng</p>
                    </div>
                    <div>
                        <div class="text-5xl font-black mb-2">10K+</div>
                        <p class="text-indigo-100 font-medium">Sản Phẩm Có Sẵn</p>
                    </div>
                    <div>
                        <div class="text-5xl font-black mb-2">100%</div>
                        <p class="text-indigo-100 font-medium">Hàng Chính Hãng</p>
                    </div>
                    <div>
                        <div class="text-5xl font-black mb-2">34</div>
                        <p class="text-indigo-100 font-medium">Tỉnh Thành Phố</p>
                    </div>
                </div>
            </div>

            <!-- Timeline Section -->
            <div class="space-y-12">
                <div class="text-center space-y-4">
                    <h2 class="text-4xl font-bold text-slate-900">Hành Trình Của Chúng Tôi</h2>
                    <p class="text-lg text-slate-600">Từ một cửa hàng nhỏ đến nền tảng thương mại điện tử hàng đầu</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center font-black text-lg">2014</div>
                            <div class="w-1 h-20 bg-indigo-200 my-2"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-2xl font-bold text-slate-900">Khởi Đầu</h3>
                            <p class="text-slate-600 mt-2">Thành lập cửa hàng bán các sản phẩm công nghệ tại Hà Nội với tư cách là cơ sở kinh doanh nhỏ</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center font-black text-lg">2018</div>
                            <div class="w-1 h-20 bg-indigo-200 my-2"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-2xl font-bold text-slate-900">Mở Rộng</h3>
                            <p class="text-slate-600 mt-2">Mở thêm các chi nhánh ở Sài Gòn, Đà Nẵng và các thành phố lớn khác</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center font-black text-lg">2022</div>
                            <div class="w-1 h-20 bg-indigo-200 my-2"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-2xl font-bold text-slate-900">Chuyên Số Hóa</h3>
                            <p class="text-slate-600 mt-2">Khởi động nền tảng thương mại điện tử TechStore.vn, cung cấp dịch vụ toàn quốc</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center font-black text-lg">2026</div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Hiện Tại</h3>
                            <p class="text-slate-600 mt-2">Là lựa chọn hàng đầu của hàng chục nghìn khách hàng, với dịch vụ vượt trội và sự tín cậy</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-slate-900 rounded-3xl p-12 text-center space-y-6">
                <h2 class="text-4xl font-bold text-white">Bắt Đầu Mua Sắm Ngay</h2>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto">
                    Khám phá hàng ngàn sản phẩm công nghệ chất lượng với giá tốt nhất
                </p>
                <a href="{{ route('shop.index') }}" class="inline-block bg-indigo-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-indigo-700 transition-colors">
                    Vào Cửa Hàng
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
