@extends('layouts.myapp')

@section('title', 'TechStore - Khám phá thế giới công nghệ')

@section('content')
<div class="space-y-12">
    {{-- Hero Section --}}
    <section class="relative h-[250px] md:h-[480px] rounded-3xl overflow-hidden shadow-2xl group">
        <img src="{{ asset('images/hero-banner.png') }}" alt="TechStore Hero" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent flex items-center px-12 md:px-20">
            <div class="max-w-2xl space-y-6">
                <h1 class="text-4xl md:text-7xl font-extrabold text-white leading-tight">
                    Khám phá Thế giới <br>
                    <span class="bg-gradient-to-r from-indigo-400 to-purple-500 bg-clip-text text-transparent">Công nghệ</span>
                </h1>
                <p class="text-slate-300 text-sm md:text-xl max-w-lg leading-relaxed hidden md:block">
                    Cập nhật những xu hướng, đánh giá sản phẩm và tin tức mới nhất từ vũ trụ TechStore.
                </p>
                <div class="flex gap-4 pt-2 md:pt-4">
                    <a href="{{ route('shop.index') }}" class="btn btn-primary btn-sm md:btn-lg rounded-2xl px-4 md:px-8 shadow-xl shadow-primary/30 hover:shadow-primary/50 transition-all border-none bg-indigo-600">
                        Mua ngay
                    </a>
                    <a href="{{ route('news.index') }}" class="btn btn-ghost btn-sm md:btn-lg text-white hover:bg-white/10 rounded-2xl border border-white/20">
                        Tin tức
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        {{-- Sidebar --}}
        <aside class="lg:col-span-1 space-y-8">
            {{-- Primary Promo Banner --}}
            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-100 group relative">
                <img src="{{ asset('images/promo-samsung.png') }}" alt="Samsung Promo" class="w-full h-auto transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-x-0 bottom-0 p-8 bg-gradient-to-t from-black/80 to-transparent">
                    <a href="{{ route('shop.index') }}" class="btn btn-primary w-full rounded-2xl border-none bg-white text-slate-900 hover:bg-indigo-600 hover:text-white font-black uppercase tracking-widest text-sm">Mua ngay</a>
                </div>
            </div>

            {{-- Voucher Section --}}
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-percent"><path d="M2.5 17a2.5 2.5 0 1 1 5 0"/><path d="M21.5 17a2.5 2.5 0 1 0-5 0"/><path d="m11 11 3 3"/><path d="m11 14 3-3"/><path d="M2 12V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v6"/><path d="M21.5 7h.5"/><path d="M21.5 17h.5"/><path d="M2 12a1 1 0 0 1 1-1h2.5a1 1 0 1 0 0-2H3a1 1 0 0 1-1-1V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1"/><path d="M2 12a1 1 0 0 0 1 1h2.5a1 1 0 1 1 0 2H3a1 1 0 0 0-1 1v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Mã giảm giá</h3>
                </div>

                <div class="space-y-4">
                    {{-- Voucher Item --}}
                    <div class="relative bg-indigo-50/50 rounded-2xl p-4 border border-dashed border-indigo-200 overflow-hidden group">
                        <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-white rounded-full border border-indigo-100"></div>
                        <div class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-white rounded-full border border-indigo-100"></div>
                        
                        <div class="flex flex-col gap-1 items-center text-center">
                            <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest leading-none mb-1">FREESHIP</span>
                            <span class="text-lg font-black text-slate-900 leading-none">Miễn phí vận chuyển</span>
                            <span class="text-[10px] text-slate-500 font-medium">Đơn tối thiểu 200K</span>
                            <button class="mt-3 px-6 py-2 bg-indigo-600 text-white rounded-xl text-xs font-bold hover:bg-slate-900 transition-colors shadow-lg shadow-indigo-100">Sao chép mã</button>
                        </div>
                    </div>

                    {{-- Voucher Item 2 --}}
                    <div class="relative bg-purple-50/50 rounded-2xl p-4 border border-dashed border-purple-200 overflow-hidden group">
                        <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-white rounded-full border border-purple-100"></div>
                        <div class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-white rounded-full border border-purple-100"></div>
                        
                        <div class="flex flex-col gap-1 items-center text-center">
                            <span class="text-[10px] font-black text-purple-400 uppercase tracking-widest leading-none mb-1">TECHNEW</span>
                            <span class="text-lg font-black text-slate-900 leading-none">Giảm ngay 50.000₫</span>
                            <span class="text-[10px] text-slate-500 font-medium">Đơn đầu tiên cho bạn mới</span>
                            <button class="mt-3 px-6 py-2 bg-purple-600 text-white rounded-xl text-xs font-bold hover:bg-slate-900 transition-colors shadow-lg shadow-purple-100">Sao chép mã</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Secondary Small Banner --}}
            <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden group shadow-xl">
                <div class="relative z-10 space-y-4">
                    <span class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em]">Sự kiện đặc biệt</span>
                    <h4 class="text-2xl font-black leading-tight">Ngày hội <br> Apple 2026</h4>
                    <p class="text-slate-400 text-xs font-medium leading-relaxed">Giảm thêm 5% cho học sinh - sinh viên khi mua iPad & MacBook.</p>
                    <button class="btn btn-sm bg-indigo-600 text-white hover:bg-white hover:text-slate-900 border-none rounded-xl font-bold px-6 shadow-lg shadow-indigo-500/20">Khám phá</button>
                </div>
                <div class="absolute -right-20 -bottom-20 w-48 h-48 bg-indigo-600/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
            </div>
        </aside>

        {{-- Product Grid --}}
        <main class="lg:col-span-3">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Sản phẩm mới nhất</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('shop.index') }}" class="text-indigo-600 font-bold hover:underline mb-0">Xem tất cả</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products as $product)
                <div class="bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 border border-slate-50 group">
                    <div class="relative aspect-[4/5] rounded-[2rem] overflow-hidden mb-6 bg-slate-50">
                        <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <button class="absolute top-4 right-4 p-3 bg-white/90 backdrop-blur-md rounded-full text-slate-400 hover:text-red-500 hover:bg-white shadow-sm transition-all transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        </button>
                    </div>
                    <div class="px-2 space-y-3">
                        <span class="text-[10px] font-extrabold text-indigo-400 tracking-[0.2em] uppercase">{{ $product->category->name ?? 'TECH' }}</span>
                        <h4 class="text-xl font-bold text-slate-900 line-clamp-1 group-hover:text-indigo-600 transition-colors">
                            <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                        </h4>
                        <div class="flex justify-between items-center pt-2">
                            <div class="flex flex-col">
                                <span class="text-2xl font-black text-indigo-600">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            </div>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="ajax-cart-form">
                                @csrf
                                <button type="submit" class="p-4 bg-indigo-600 text-white rounded-[1.25rem] hover:bg-slate-900 shadow-lg shadow-indigo-100 hover:shadow-slate-200 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 text-lg">Chưa có sản phẩm nào được cập nhật.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>

    {{-- Features Section --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12">
        <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 flex flex-col items-center text-center gap-6 shadow-sm hover:shadow-md transition-all">
            <div class="p-5 bg-indigo-50 text-indigo-600 rounded-[2rem]">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-5h-7v7h2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
            </div>
            <div class="space-y-2">
                <h5 class="text-xl font-bold text-slate-900">Giao hàng tốc hành</h5>
                <p class="text-slate-500 leading-relaxed">Nhận hàng ngay trong ngày cho các đơn nội thành.</p>
            </div>
        </div>
        <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 flex flex-col items-center text-center gap-6 shadow-sm hover:shadow-md transition-all">
            <div class="p-5 bg-purple-50 text-purple-600 rounded-[2rem]">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            <div class="space-y-2">
                <h5 class="text-xl font-bold text-slate-900">Bảo hành uy tín</h5>
                <p class="text-slate-500 leading-relaxed">Hỗ trợ kỹ thuật 24/7 và chính sách đổi trả minh bạch.</p>
            </div>
        </div>
        <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 flex flex-col items-center text-center gap-6 shadow-sm hover:shadow-md transition-all">
            <div class="p-5 bg-blue-50 text-blue-600 rounded-[2rem]">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
            </div>
            <div class="space-y-2">
                <h5 class="text-xl font-bold text-slate-900">Thanh toán an toàn</h5>
                <p class="text-slate-500 leading-relaxed">Đa dạng hình thức thanh toán từ tiền mặt đến chuyển khoản.</p>
            </div>
        </div>
    </section>
</div>
@endsection
