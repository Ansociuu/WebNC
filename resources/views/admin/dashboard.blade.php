@extends('layouts.admin')

@section('title', 'Quản trị - TechStore')

@section('admin_content')
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
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-6 gap-6">
        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-blue-50 text-blue-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Thành viên</h3>
                <p class="text-2xl font-black text-slate-900">{{ $stats['users_count'] }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-indigo-50 text-indigo-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Sản phẩm</h3>
                <p class="text-2xl font-black text-slate-900">{{ $stats['products_count'] }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-purple-50 text-purple-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Tin tức</h3>
                <p class="text-2xl font-black text-slate-900">{{ $stats['news_count'] }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-emerald-50 text-emerald-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tags"><path d="m15 5 1.9 1.9A1 1 0 0 1 17.2 8l-8.2 8.2a1 1 0 0 1-1.1.2L6 15l1.4-1.9a1 1 0 0 1 .2-1.1L15.8 3.8a1 1 0 0 1 1.4 0"/><path d="M13 7l4 4"/><path d="m12 12-4 4"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Danh mục</h3>
                <p class="text-2xl font-black text-slate-900">{{ $stats['categories_count'] }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-orange-50 text-orange-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Đơn hàng</h3>
                <p class="text-2xl font-black text-slate-900">{{ $stats['orders_count'] }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 space-y-3">
            <div class="p-3 bg-rose-50 text-rose-600 w-fit rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote"><rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg>
            </div>
            <div>
                <h3 class="text-slate-400 font-bold uppercase tracking-widest text-[8px]">Doanh thu</h3>
                <p class="text-xl font-black text-slate-900">{{ number_format($stats['revenue'], 0, ',', '.') }}₫</p>
            </div>
        </div>
    </div>

    {{-- Tables Grid --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        {{-- Latest Orders --}}
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-900">Đơn hàng mới nhất</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 font-bold text-sm hover:underline">Xem tất cả</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-slate-50">
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Mã</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Khách hàng</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Tổng tiền</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latest_orders as $order)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="font-bold text-slate-700">#{{ $order->id }}</td>
                            <td class="text-slate-500 font-medium">{{ optional($order->user)->name ?? $order->full_name }}</td>
                            <td class="font-black text-indigo-600">{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                            <td><span class="badge badge-sm font-bold text-[10px]">{{ $order->status }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Latest Products --}}
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-900">Sản phẩm mới nhất</h3>
                <a href="{{ route('admin.products.index') }}" class="text-indigo-600 font-bold text-sm hover:underline">Xem tất cả</a>
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
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden xl:col-span-2">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-900">Thành viên mới</h3>
                <a href="{{ route('admin.users.index') }}" class="text-indigo-600 font-bold text-sm hover:underline">Xem tất cả</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-slate-50">
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Tên</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Email</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Vai trò</th>
                            <th class="bg-transparent text-slate-500 font-bold uppercase text-[10px]">Ngày đăng ký</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latest_users as $user)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="font-bold text-slate-700">{{ $user->name }}</td>
                            <td class="text-slate-500 font-medium">{{ $user->email }}</td>
                            <td><span class="badge {{ $user->role === 'admin' ? 'badge-primary' : 'badge-ghost' }} font-bold text-[10px]">{{ $user->role }}</span></td>
                            <td class="text-slate-400 text-sm italic">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
