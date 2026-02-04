@extends('layouts.myapp')

@section('title', 'Chi tiết đơn hàng #' . $order->id . ' - TechStore')

@section('content')
<div class="max-w-6xl mx-auto space-y-8 pb-12">
    {{-- Header & Back Button --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-4">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 text-slate-500 font-bold hover:text-indigo-600 transition-colors group">
                <div class="p-2 rounded-xl group-hover:bg-indigo-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                </div>
                Quay lại danh sách
            </a>
            <div class="flex items-center gap-4">
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Chi tiết đơn hàng <span class="text-indigo-600">#{{ $order->id }}</span></h1>
                <span class="badge badge-lg font-black border-none px-4 py-4 rounded-xl
                    {{ $order->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 
                       ($order->status === 'cancelled' ? 'bg-rose-100 text-rose-700' : 'bg-indigo-100 text-indigo-700') }}">
                    {{ $order->status === 'pending' ? 'Chờ xử lý' : ($order->status === 'completed' ? 'Thành công' : 'Đã hủy') }}
                </span>
            </div>
        </div>
        <div class="flex items-center gap-2 text-slate-400 font-bold text-sm bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            {{ $order->created_at->format('d/m/Y H:i') }}
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Order Items --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                    <h3 class="text-xl font-black text-slate-900">Danh sách sản phẩm</h3>
                    <span class="text-slate-400 font-bold">{{ count($order->items) }} Mặt hàng</span>
                </div>
                <div class="p-8 divide-y divide-slate-100">
                    @foreach($order->items as $item)
                    <div class="py-6 first:pt-0 last:pb-0 flex gap-6 group">
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-[1.5rem] bg-slate-50 border border-slate-100 transition-transform duration-500 group-hover:scale-105">
                            <img src="{{ $item->product->image ? (str_starts_with($item->product->image, 'http') ? $item->product->image : asset('storage/' . $item->product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-lg font-black text-slate-900 group-hover:text-indigo-600 transition-colors">
                                        <a href="{{ route('shop.show', $item->product->slug) }}">{{ $item->product->name }}</a>
                                    </h4>
                                    <p class="text-slate-500 font-bold text-sm mt-1">Đơn giá: {{ number_format($item->price, 0, ',', '.') }}₫</p>
                                </div>
                                <span class="text-indigo-600 font-black text-xl">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Số lượng:</span>
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg font-black text-sm">{{ $item->quantity }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-8 bg-slate-900 text-white flex justify-between items-center">
                    <span class="text-slate-400 font-black uppercase tracking-[0.2em] text-sm">Tổng cộng thanh toán</span>
                    <span class="text-3xl font-black text-white">{{ number_format($order->total_price, 0, ',', '.') }}₫</span>
                </div>
            </div>
        </div>

        {{-- Shipping Info --}}
        <div class="space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden p-8 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-5h-7v7h2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-900">Thông tin nhận hàng</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex flex-col gap-1 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Họ tên</span>
                        <span class="font-bold text-slate-900 italic">{{ $order->full_name }}</span>
                    </div>
                    <div class="flex flex-col gap-1 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Số điện thoại</span>
                        <span class="font-bold text-slate-900 italic">{{ $order->phone }}</span>
                    </div>
                    <div class="flex flex-col gap-1 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Địa chỉ</span>
                        <span class="font-bold text-slate-900 italic">{{ $order->shipping_address }}</span>
                    </div>
                    @if($order->notes)
                    <div class="flex flex-col gap-1 p-4 bg-indigo-50/50 rounded-2xl border border-indigo-100">
                        <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest">Ghi chú</span>
                        <span class="text-slate-700 italic font-medium leading-relaxed">{{ $order->notes }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="bg-indigo-600 rounded-[2.5rem] p-8 text-white relative overflow-hidden group shadow-xl shadow-indigo-200">
                <div class="relative z-10 space-y-4">
                    <h4 class="text-2xl font-black leading-tight">Cần hỗ trợ?</h4>
                    <p class="text-indigo-100 text-xs font-bold leading-relaxed">Nếu bạn có bất kỳ thắc mắc nào về vận đơn, hãy liên hệ ngay với phòng CSKH của TechStore.</p>
                    <button class="btn btn-sm bg-white text-indigo-600 hover:bg-slate-900 hover:text-white border-none rounded-xl font-black px-6">Liên hệ</button>
                </div>
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
            </div>
        </div>
    </div>
</div>
@endsection
