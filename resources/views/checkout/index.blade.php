@extends('layouts.myapp')

@section('title', 'Thanh toán - TechStore')

@section('content')
    <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
            <li class="text-slate-600">Thanh toán</li>
        </ul>
    </div>

    <form action="{{ route('checkout.store') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
        @csrf

        {{-- Shipping Info --}}
        <div class="flex-1">
            <div class="card bg-white border border-slate-100 shadow-sm mb-6">
                <div class="card-body p-6 md:p-8">
                    <h2 class="card-title text-xl border-b border-slate-100 pb-4 mb-6 flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center text-sm">
                            1</div>
                        Thông tin giao hàng
                    </h2>

                    <div class="form-control mb-4">
                        <label class="label"><span class="label-text font-bold">Họ và tên</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name', auth()->user()->name) }}"
                            class="input input-bordered w-full focus:input-primary rounded-xl" required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">Email</span></label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                class="input input-bordered w-full focus:input-primary rounded-xl" required />
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">Số điện thoại</span></label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                class="input input-bordered w-full focus:input-primary rounded-xl" required
                                placeholder="Ví dụ: 0912345678" />
                        </div>
                    </div>

                    <div class="form-control mb-4">
                        <label class="label"><span class="label-text font-bold">Địa chỉ giao hàng</span></label>
                        <textarea name="shipping_address"
                            class="textarea textarea-bordered h-24 focus:textarea-primary rounded-xl"
                            placeholder="Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố"
                            required>{{ old('shipping_address') }}</textarea>
                    </div>

                    <div class="form-control">
                        <label class="label"><span class="label-text font-bold">Ghi chú (Tùy chọn)</span></label>
                        <textarea name="notes" class="textarea textarea-bordered focus:textarea-primary rounded-xl"
                            placeholder="Ví dụ: Giao hàng trong giờ hành chính">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card bg-white border border-slate-100 shadow-sm">
                <div class="card-body p-6 md:p-8">
                    <h2 class="card-title text-xl border-b border-slate-100 pb-4 mb-6 flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center text-sm">
                            2</div>
                        Phương thức thanh toán
                    </h2>

                    <div class="form-control">
                        <label
                            class="label cursor-pointer justify-start gap-4 p-4 border border-primary bg-primary/5 rounded-xl mb-3">
                            <input type="radio" name="payment_method" value="cod" class="radio radio-primary" checked />
                            <span class="label-text font-bold">Thanh toán khi nhận hàng (COD)</span>
                        </label>
                        <label
                            class="label cursor-pointer justify-start gap-4 p-4 border border-slate-200 rounded-xl opacity-50 cursor-not-allowed">
                            <input type="radio" name="payment_method" value="banking" class="radio" disabled />
                            <div class="flex flex-col">
                                <span class="label-text font-bold">Chuyên khoản ngân hàng</span>
                                <span class="text-xs text-slate-400">Đang bảo trì</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Order Summary --}}
        <div class="w-full lg:w-96 shrink-0">
            <div class="card bg-white shadow-lg border border-slate-100 sticky top-24">
                <div class="card-body p-6">
                    <h2 class="card-title text-xl mb-6">Đơn hàng của bạn</h2>

                    <div
                        class="max-h-64 overflow-y-auto mb-6 pr-2 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                        @foreach($cartItems as $item)
                            <div class="flex gap-3 mb-4 last:mb-0">
                                <div class="avatar rounded-lg bg-slate-50 p-1 shrink-0">
                                    <div class="w-12 h-12 rounded overflow-hidden">
                                        <img src="{{ $item->product->image ? (str_starts_with($item->product->image, 'http') ? $item->product->image : asset('storage/' . $item->product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=100&h=100&fit=crop' }}" 
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-sm truncate">{{ $item->product->name }}</h4>
                                    <div class="text-xs text-slate-500">SL: {{ $item->quantity }} x
                                        {{ number_format($item->product->price, 0, ',', '.') }}₫</div>
                                </div>
                                <div class="font-bold text-sm text-right shrink-0">
                                    {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}₫
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="divider my-2"></div>

                    <div class="space-y-3 mb-8">
                        <div class="flex justify-between text-slate-600 text-sm">
                            <span>Tạm tính</span>
                            <span>{{ number_format($total, 0, ',', '.') }}₫</span>
                        </div>
                        <div class="flex justify-between text-slate-600 text-sm">
                            <span>Phí vận chuyển</span>
                            <span class="text-success font-medium">Miễn phí</span>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                            <span class="font-bold text-lg text-slate-800">Tổng thu</span>
                            <span
                                class="font-extrabold text-2xl text-primary">{{ number_format($total, 0, ',', '.') }}₫</span>
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-primary btn-block rounded-xl shadow-xl shadow-primary/20 text-lg py-3 h-auto">
                        Đặt hàng ngay
                    </button>

                    <a href="{{ route('cart.index') }}"
                        class="btn btn-ghost btn-xs w-full mt-4 font-normal text-slate-400">Quay lại giỏ hàng</a>
                </div>
            </div>
        </div>
    </form>
@endsection