<header class="sticky top-0 z-50 glass-nav border-b border-slate-200">
    <div class="container mx-auto px-4">
        <div class="navbar bg-transparent px-0 h-20">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 font-medium border border-slate-100">
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{route('news.index')}}">Tin tức</a></li>
                        <li><a href="/about">Giới thiệu</a></li>
                    </ul>
                </div>
                <a href="{{route('home')}}" class="text-2xl font-extrabold tracking-tight flex items-center gap-2">
                    <span class="bg-primary text-white p-2 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cpu"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>
                    </span>
                    <span class="bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent">TechStore</span>
                </a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 font-semibold gap-2">
                    <li><a href="{{route('home')}}" class="hover:text-primary transition-colors">Trang chủ</a></li>
                    <li><a href="{{route('news.index')}}" class="hover:text-primary transition-colors">Tin tức</a></li>
                    <li><a href="/about" class="hover:text-primary transition-colors">Giới thiệu</a></li>
                </ul>
            </div>
            <div class="navbar-end gap-2">
                @if (Route::has('login'))
                    @auth
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar online placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-10">
                                    <span class="text-xs uppercase">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 border border-slate-100">
                                <li class="menu-title text-slate-400 px-4 py-2">{{Auth::user()->name}}</li>
                                <li><a href="{{ route('profile.edit') }}" class="py-3">Hồ sơ cá nhân</a></li>
                                <li>
                                    <form method="POST" action="{{route('logout')}}" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full text-left py-3 px-4 hover:bg-error/10 hover:text-error transition-colors rounded-lg">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm font-semibold">Đăng nhập</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm rounded-full px-6 shadow-lg shadow-primary/25">Đăng ký</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>