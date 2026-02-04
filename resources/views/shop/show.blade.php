@extends('layouts.myapp')

@section('title', $product->name . ' - TechStore')

@section('content')
    <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('shop.index') }}">Sản phẩm</a></li>
            <li class="text-slate-600">{{ $product->name }}</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16 mb-20">
        {{-- Product Image --}}
        <div class="relative bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 aspect-square">
            <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=800&h=800&fit=crop' }}" 
                alt="{{ $product->name }}"
                class="w-full h-full object-cover">
        </div>

        {{-- Product Info --}}
        <div>
            <div class="badge badge-primary badge-outline font-bold mb-4">{{ $product->category->name }}</div>
            <h1 class="text-4xl font-extrabold text-slate-800 mb-4 leading-tight">{{ $product->name }}</h1>
            <div class="text-3xl font-bold text-primary mb-8">{{ number_format($product->price, 0, ',', '.') }}₫</div>

            <div class="prose prose-slate mb-8 text-slate-600 leading-relaxed">
                <p>{{ $product->description }}</p>
                <p>Mô tả chi tiết sản phẩm sẽ được cập nhật thêm. Sản phẩm chính hãng, bảo hành 12 tháng, đổi trả trong 7
                    ngày nếu có lỗi từ nhà sản xuất.</p>
            </div>

            @if($product->stock > 0)
                <form action="{{ route('cart.add', $product->id) }}" method="POST"
                    class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-slate-100">
                    @csrf
                    <div class="join border border-slate-200 rounded-lg">
                        <button type="button" class="join-item btn btn-ghost px-4"
                            onclick="document.getElementById('qty').stepDown()">-</button>
                        <input type="number" name="quantity" id="qty" value="1" min="1" max="{{ $product->stock }}"
                            class="join-item btn btn-ghost w-16 text-center focus:outline-none pointer-events-none appearance-none">
                        <button type="button" class="join-item btn btn-ghost px-4"
                            onclick="document.getElementById('qty').stepUp()">+</button>
                    </div>

                    <button type="submit" class="btn btn-primary flex-1 shadow-xl shadow-primary/20 text-lg rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Thêm vào giỏ
                    </button>
                </form>
                <div class="mt-4 text-sm text-green-600 font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Còn hàng ({{ $product->stock }} sản phẩm)
                </div>
            @else
                <div class="alert alert-error text-white font-bold rounded-xl mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Sản phẩm này tạm thời hết hàng.</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Related Products --}}
    @if($relatedProducts->count() > 0)
        <div class="border-t border-slate-100 pt-16">
            <h3 class="text-2xl font-bold mb-8">Sản phẩm liên quan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <a href="{{ route('shop.show', $related->slug) }}"
                        class="card bg-base-100 border border-slate-100 hover:shadow-lg transition-all duration-300">
                        <figure class="aspect-square bg-slate-50">
                            <img src="{{ $related->image ? (str_starts_with($related->image, 'http') ? $related->image : asset('storage/' . $related->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=300&h=300&fit=crop' }}"
                                 alt="{{ $related->name }}" 
                                 class="object-cover w-full h-full" />
                        </figure>
                        <div class="card-body p-4">
                            <h4 class="font-bold text-slate-800 line-clamp-2 min-h-[3rem]">{{ $related->name }}</h4>
                            <div class="text-primary font-bold mt-2">{{ number_format($related->price, 0, ',', '.') }}₫</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endsection