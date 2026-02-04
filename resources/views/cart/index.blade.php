@extends('layouts.myapp')

@section('title', 'Giỏ hàng - TechStore')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Giỏ hàng của bạn</h1>

    @if($cartItems->count() > 0)
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1">
                <div class="card bg-white shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 border-b border-slate-100">
                                    <th class="py-4">Sản phẩm</th>
                                    <th class="py-4">Giá</th>
                                    <th class="py-4 text-center">Số lượng</th>
                                    <th class="py-4 text-right">Tổng</th>
                                    <th class="py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr class="border-b border-slate-50 last:border-none hover:bg-slate-50/50 transition-colors">
                                        <td>
                                            <div class="flex items-center gap-4">
                                                <div class="avatar rounded-xl bg-slate-100 p-1">
                                                    <div class="mask mask-squircle w-16 h-16">
                                                        <img src="{{ $item->product->image ? (str_starts_with($item->product->image, 'http') ? $item->product->image : asset('storage/' . $item->product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=100&h=100&fit=crop' }}"
                                                            alt="{{ $item->product->name }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-bold text-lg cursor-pointer hover:text-primary transition-colors">
                                                        <a
                                                            href="{{ route('shop.show', $item->product->slug) }}">{{ $item->product->name }}</a>
                                                    </div>
                                                    <div class="text-sm opacity-50">{{ $item->product->category->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="font-medium text-slate-600">
                                            {{ number_format($item->product->price, 0, ',', '.') }}₫
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                class="flex justify-center">
                                                @csrf
                                                @method('PATCH')
                                                <div class="join border border-slate-200 rounded-lg bg-white shadow-sm">
                                                    <button type="button" class="join-item btn btn-xs btn-ghost px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.form.submit()">-</button>
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                                        max="{{ $item->product->stock }}"
                                                        class="join-item w-12 text-center text-sm focus:outline-none pointer-events-none appearance-none bg-transparent font-bold"
                                                        onchange="this.form.submit()">
                                                    <button type="button" class="join-item btn btn-xs btn-ghost px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.form.submit()">+</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-right font-bold text-slate-800">
                                            {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}₫
                                        </td>
                                        <td class="text-right">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-ghost btn-circle btn-sm text-slate-400 hover:text-error hover:bg-error/10 tooltip"
                                                    data-tip="Xóa">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('shop.index') }}" class="btn btn-ghost gap-2 text-slate-600 hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                        Tiếp tục mua sắm
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-96 shrink-0">
                <div class="card bg-white shadow-lg border border-slate-100 sticky top-24">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-6">Tổng đơn hàng</h2>

                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-slate-500">
                                <span>Tạm tính</span>
                                <span>{{ number_format($total, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="flex justify-between text-slate-500">
                                <span>Phí vận chuyển</span>
                                <span class="text-success font-medium">Miễn phí</span>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                                <span class="font-bold text-lg text-slate-800">Tổng cộng</span>
                                <span
                                    class="font-extrabold text-2xl text-primary">{{ number_format($total, 0, ',', '.') }}₫</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}"
                            class="btn btn-primary btn-block rounded-xl shadow-xl shadow-primary/20 text-lg">
                            Thanh toán
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>

                        <div class="mt-4 flex items-center justify-center gap-2 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Bảo mật thanh toán 100%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-2">Giỏ hàng trống</h2>
            <p class="text-slate-500 mb-8">Bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary rounded-full px-8 shadow-lg shadow-primary/25">Khám phá
                sản phẩm</a>
        </div>
    @endif
@endsection