@extends('layouts.myapp')

@section('title', 'Bảng điều khiển - TechStore')

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Welcome Hero Section --}}
        <section class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-slate-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-10 hidden md:block">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-layout-dashboard">
                    <rect width="7" height="9" x="3" y="3" rx="1" />
                    <rect width="7" height="5" x="14" y="3" rx="1" />
                    <rect width="7" height="9" x="14" y="12" rx="1" />
                    <rect width="7" height="5" x="3" y="16" rx="1" />
                </svg>
            </div>

            <div class="relative z-10">
                <span class="badge badge-primary font-bold mb-4">Xin chào, {{ Auth::user()->name }}!</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6 leading-tight">Chào mừng bạn trở lại với
                    <span
                        class="bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent italic">TechStore</span>
                </h1>
                <p class="text-slate-500 text-lg mb-8 max-w-2xl">Đây là bảng điều khiển cá nhân của bạn. Tại đây bạn có thể
                    quản lý thông tin tài khoản, theo dõi các hoạt động và khám phá những tin tức công nghệ mới nhất.</p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('home') }}" class="btn btn-primary rounded-xl px-8 shadow-lg shadow-primary/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-home">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Về trang chủ
                    </a>
                    <a href="{{ route('news.index') }}"
                        class="btn btn-outline rounded-xl px-8 hover:bg-slate-50 hover:text-primary border-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-newspaper">
                            <path
                                d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                            <path d="M18 14h-8" />
                            <path d="M15 18h-5" />
                            <path d="M10 6h8v4h-8V6Z" />
                        </svg>
                        Xem tin tức
                    </a>
                </div>
            </div>
        </section>

        {{-- Stats or Quick Info --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="bg-blue-50 text-blue-600 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Loại tài khoản</p>
                    <p class="text-lg font-bold text-slate-800 capitalize">{{ Auth::user()->role ?? 'Thành viên' }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="bg-emerald-50 text-emerald-600 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shield-check">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Trạng thái</p>
                    <p class="text-lg font-bold text-slate-800">Đã xác thực</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="bg-purple-50 text-purple-600 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-clock">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tham gia từ</p>
                    <p class="text-lg font-bold text-slate-800">{{ Auth::user()->created_at->format('m/Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Account Settings Link Card --}}
        <div
            class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl p-8 shadow-xl flex flex-col md:flex-row items-center justify-between gap-8 h-full">
            <div class="text-center md:text-left">
                <h3 class="text-xl font-bold text-white mb-2">Quản lý hồ sơ cá nhân</h3>
                <p class="text-slate-400">Cập nhật thông tin cá nhân, thay đổi mật khẩu và quản lý bảo mật tài khoản.</p>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="btn btn-white rounded-xl px-10 border-none bg-white text-slate-900 hover:bg-slate-100 shrink-0">
                Cài đặt tài khoản
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-settings">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.72v.18a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </a>
        </div>
    </div>
@endsection