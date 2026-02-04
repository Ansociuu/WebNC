@extends('layouts.admin')

@section('title', 'Quản lý Đơn hàng')

@section('admin_content')
    <div class="mb-8">
        <h1 class="text-4xl font-black text-slate-900 tracking-tight">Quản lý đơn hàng</h1>
        <p class="text-slate-500 font-medium">Theo dõi và xử lý đơn hàng từ khách hàng.</p>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Mã đơn</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Khách hàng</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Tổng tiền</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Trạng thái</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($orders as $order)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-6">
                            <div class="font-black text-slate-900">#{{ $order->id }}</div>
                        </td>
                        <td class="p-6">
                            <div class="text-slate-900 font-bold">{{ optional($order->user)->name ?? $order->full_name }}</div>
                            <div class="text-slate-400 text-xs font-medium">{{ optional($order->user)->email ?? $order->email }}</div>
                        </td>
                        <td class="p-6 text-center">
                            <div class="font-black text-indigo-600 text-lg">{{ number_format($order->total_price ?? 0, 0, ',', '.') }}₫</div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="badge badge-ghost rounded-lg font-bold px-4 py-3 bg-slate-100 text-slate-600 border-none">{{ $order->status }}</span>
                        </td>
                        <td class="p-6 text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-ghost btn-square rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-all text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-6 bg-slate-50 border-t border-slate-100">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
