<footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800 mt-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 md:col-span-1">
                <a href="{{route('home')}}" class="text-2xl font-extrabold tracking-tight flex items-center gap-2 mb-6 text-white">
                    <span class="bg-primary text-white p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cpu"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>
                    </span>
                    <span>TechStore</span>
                </a>
                <p class="text-sm leading-relaxed text-slate-400">
                    Chuyên cung cấp các giải pháp công nghệ hiện đại, linh kiện máy tính và thiết bị điện tử chính hãng với dịch vụ tận tâm.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Liên kết nhanh</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{route('home')}}" class="hover:text-primary transition-colors text-slate-400">Trang chủ</a></li>
                    <li><a href="{{route('news.index')}}" class="hover:text-primary transition-colors text-slate-400">Tin tức công nghệ</a></li>
                    <li><a href="/about" class="hover:text-primary transition-colors text-slate-400">Về chúng tôi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Hỗ trợ khách hàng</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-primary transition-colors text-slate-400">Trung tâm trợ giúp</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors text-slate-400">Chính sách bảo hành</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors text-slate-400">Vận chuyển & Giao nhận</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Bản tin</h4>
                <p class="text-sm text-slate-400 mb-4">Đăng ký để nhận thông tin ưu đãi mới nhất.</p>
                <div class="join w-full">
                    <input class="input input-bordered join-item w-full bg-slate-800 border-slate-700 text-white text-sm" placeholder="Email của bạn" />
                    <button class="btn btn-primary join-item px-4">Gửi</button>
                </div>
            </div>
        </div>
        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} TechStore. All rights reserved.
            </p>
            <div class="flex gap-4">
                <a href="#" class="btn btn-ghost btn-xs btn-circle text-slate-400 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="#" class="btn btn-ghost btn-xs btn-circle text-slate-400 hover:text-primary">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>