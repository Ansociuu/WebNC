@extends('layouts.myapp')

@section('title', 'Đặt hàng thành công - TechStore')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="text-center max-w-lg mx-auto p-4">
            <div class="w-24 h-24 bg-success/10 text-success rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </div>
            
            <h1 class="text-4xl font-extrabold text-slate-800 mb-4">Cảm ơn bạn!</h1>
            <p class="text-xl text-slate-600 mb-2">Đơn hàng của bạn đã được đặt thành công.</p>
            <p class="text-slate-500 mb-8">Mã đơn hàng: <span class="font-bold font-mono bg-slate-100 px-2 py-1 rounded text-slate-700">#{{ $order->id }}</span></p>
            
            <div class="card bg-white border border-slate-100 shadow-sm mb-8 text-left">
                <div class="card-body p-6">
                    <h3 class="font-bold text-slate-800 mb-2">Thông tin người nhận</h3>
                    <p class="text-sm text-slate-600"><span class="font-medium">Họ tên:</span> {{ $order->full_name }}</p>
                    <p class="text-sm text-slate-600"><span class="font-medium">Số điện thoại:</span> {{ $order->phone }}</p>
                    <p class="text-sm text-slate-600"><span class="font-medium">Địa chỉ:</span> {{ $order->shipping_address }}</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="btn btn-primary rounded-full px-8 shadow-lg shadow-primary/20">Về trang chủ</a>
                <a href="{{ route('shop.index') }}" class="btn btn-ghost rounded-full px-8">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
@endsection
