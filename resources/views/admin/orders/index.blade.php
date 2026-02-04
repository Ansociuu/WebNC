@extends('layouts.myapp')

@section('title', 'Quản lý Đơn hàng')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Đơn hàng</h1>
    </div>

    <div class="bg-white rounded-[1rem] shadow-sm border border-slate-100 overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-50">
                    <th class="text-slate-500 font-bold">Mã</th>
                    <th class="text-slate-500 font-bold">Khách</th>
                    <th class="text-slate-500 font-bold">Tổng</th>
                    <th class="text-slate-500 font-bold">Trạng thái</th>
                    <th class="text-slate-500 font-bold">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="hover:bg-slate-50">
                    <td class="font-bold">#{{ $order->id }}</td>
                    <td class="text-slate-500">{{ optional($order->user)->name }}</td>
                    <td class="font-black text-indigo-600">{{ number_format($order->total ?? 0, 0, ',', '.') }}₫</td>
                    <td><span class="badge">{{ $order->status }}</span></td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-ghost">Xem</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $orders->links() }}</div>
</div>
@endsection
