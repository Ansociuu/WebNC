@extends('layouts.myapp')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Đơn hàng #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 font-bold">Quay về danh sách</a>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <p><strong>Khách:</strong> {{ optional($order->user)->name }} ({{ optional($order->user)->email }})</p>
        <p><strong>Tổng:</strong> {{ number_format($order->total ?? 0, 0, ',', '.') }}₫</p>
        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h3 class="font-bold mb-4">Sản phẩm</h3>
        <ul class="space-y-3">
            @foreach($order->items as $item)
                <li class="flex justify-between">
                    <div>
                        <div class="font-bold">{{ optional($item->product)->name }}</div>
                        <div class="text-slate-500 text-sm">Số lượng: {{ $item->quantity }}</div>
                    </div>
                    <div class="font-black text-indigo-600">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex items-center gap-4">
            @csrf
            @method('PUT')
            <label class="font-medium">Cập nhật trạng thái</label>
            <select name="status" class="input">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>pending</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>processing</option>
                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>completed</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>cancelled</option>
            </select>
            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
