@extends('layouts.myapp')

@section('title', 'Quản trị - TechStore')

@section('content')
<div class="flex flex-col lg:flex-row gap-8 min-h-screen pb-20">
    {{-- Admin Sidebar --}}
    <aside class="lg:w-72 space-y-4">
        <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <div>
                        <h2 class="font-black text-lg leading-none">Admin Panel</h2>
                        <span class="text-[10px] text-indigo-400 font-bold uppercase tracking-widest">TechStore v2.0</span>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-500/20 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                        Tổng quan
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-4 p-4 rounded-2xl text-slate-400 hover:text-white hover:bg-white/5 font-bold transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                        Sản phẩm
                    </a>
                    <a href="#" class="flex items-center gap-4 p-4 rounded-2xl text-slate-400 hover:text-white hover:bg-white/5 font-bold transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Thành viên
                    </a>
                </nav>
            </div>
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-600/10 rounded-full blur-3xl"></div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 space-y-8">
        {{-- Header --}}
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Tổng quan quản trị</h1>
                <p class="text-slate-500 font-medium">Chào mừng trở lại, {{ Auth::user()->name }}!</p>
            </div>
            <div class="flex gap-4">
                <button class="btn btn-outline rounded-2xl border-slate-200 hover:bg-slate-50 text-slate-900 border-none bg-white font-bold h-14 px-6 shadow-sm">Tải báo cáo</button>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-50 space-y-4">
                <div class="p-4 bg-blue-50 text-blue-600 w-fit rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Thành viên</h3>
                    <p class="text-4xl font-black text-slate-900">{{ $stats['users_count'] }}</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-50 space-y-4">
                <div class="p-4 bg-indigo-50 text-indigo-600 w-fit rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Sản phẩm</h3>
                    <p class="text-4xl font-black text-slate-900">{{ $stats['products_count'] }}</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-50 space-y-4">
                <div class="p-4 bg-purple-50 text-purple-600 w-fit rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Tin tức</h3>
                    <p class="text-4xl font-black text-slate-900">{{ $stats['news_count'] }}</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-50 space-y-4">
                <div class="p-4 bg-emerald-50 text-emerald-600 w-fit rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tags"><path d="m15 5 1.9 1.9A1 1 0 0 1 17.2 8l-8.2 8.2a1 1 0 0 1-1.1.2L6 15l1.4-1.9a1 1 0 0 1 .2-1.1L15.8 3.8a1 1 0 0 1 1.4 0"/><path d="M13 7l4 4"/><path d="m12 12-4 4"/><path d="M18 10l-1.5-1.5"/><path d="M22 6l-1.5-1.5"/><path d="m2 22 5-5"/><path d="M6 3.5a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-6Z"/></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Danh mục</h3>
                    <p class="text-4xl font-black text-slate-900">{{ $stats['categories_count'] }}</p>
                </div>
            </div>
        </div>

        {{-- Tables Grid --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            {{-- Latest Products --}}
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-slate-900">Sản phẩm mới nhất</h3>
                    <a href="#" class="text-indigo-600 font-bold text-sm hover:underline">Xem tất cả</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Sản phẩm</th>
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Danh mục</th>
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latest_products as $product)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="font-bold text-slate-700">{{ $product->name }}</td>
                                <td><span class="badge badge-ghost font-medium">{{ $product->category->name }}</span></td>
                                <td class="font-black text-indigo-600">{{ number_format($product->price, 0, ',', '.') }}₫</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Latest Users --}}
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-slate-900">Thành viên mới</h3>
                    <a href="#" class="text-indigo-600 font-bold text-sm hover:underline">Xem tất cả</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Tên</th>
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Email</th>
                                <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Vai trò</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latest_users as $user)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="font-bold text-slate-700">{{ $user->name }}</td>
                                <td class="text-slate-500 font-medium">{{ $user->email }}</td>
                                <td><span class="badge {{ $user->role === 'admin' ? 'badge-primary' : 'badge-ghost' }} font-bold text-[10px]">{{ $user->role }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
