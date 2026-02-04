@extends('layouts.myapp')

@section('title', 'Lịch sử mua hàng - TechStore')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Lịch sử mua hàng</h1>
            <p class="text-slate-500 mt-1">Quản lý và theo dõi các đơn hàng công nghệ của bạn.</p>
        </div>
        <div class="bg-white px-6 py-3 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
            <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            </div>
            <span class="font-bold text-slate-800">{{ $orders->total() }} Đơn hàng</span>
        </div>
    </div>

    {{-- Content --}}
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        @if($orders->isEmpty())
            <div class="p-20 text-center">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-open"><path d="M12 22v-9"/><path d="M12 13 4.63 8.35a2 2 0 0 1 0-3.38L10.37 1.4a2 2 0 0 1 1.26 0l5.74 3.57a2 2 0 0 1 0 3.38L12 13Z"/><path d="M16.5 2h-1"/><path d="m3 13 4.63-2.88"/><path d="m21 13-4.63-2.88"/><path d="M12 22h10l1-9h-3.5L12 13Z"/><path d="M12 22H2l-1-9h3.5L12 13Z"/><path d="M22 13h-4.5L12 13l-5.5 0H2"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Chưa có đơn hàng nào</h3>
                <p class="text-slate-500 mb-8">Bạn vẫn chưa thực hiện giao dịch nào tại cửa hàng.</p>
                <a href="{{ route('shop.index') }}" class="btn btn-primary rounded-xl px-10 border-none bg-indigo-600 text-white hover:bg-slate-900 transition-all font-bold">
                    Khám phá ngay
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 border-b border-slate-100">
                        <tr>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Mã đơn</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Thời gian</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Thanh toán</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Trạng thái</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest leading-none text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($orders as $order)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <span class="font-black text-slate-900">#{{ $order->id }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-slate-900 font-bold">{{ $order->created_at->format('d/m/Y') }}</span>
                                    <span class="text-slate-400 text-xs">{{ $order->created_at->format('H:i') }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-indigo-600 font-extrabold text-lg">{{ number_format($order->total_price, 0, ',', '.') }}₫</span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="badge badge-sm font-bold border-none px-3 py-3 rounded-lg
                                    {{ $order->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 
                                       ($order->status === 'cancelled' ? 'bg-rose-100 text-rose-700' : 'bg-indigo-100 text-indigo-700') }}">
                                    {{ $order->status === 'pending' ? 'Chờ xử lý' : ($order->status === 'completed' ? 'Thành công' : 'Đã hủy') }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <a href="{{ route('orders.show', $order) }}" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:text-slate-900 transition-colors">
                                    Chi tiết
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($orders->hasPages())
                <div class="px-8 py-6 border-t border-slate-100 bg-slate-50/30">
                    {{ $orders->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
