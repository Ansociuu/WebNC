@extends('layouts.myapp')

@section('title', 'Sản phẩm - TechStore')

@section('content')
    <div class="flex flex-col md:flex-row gap-8">
        {{-- Sidebar Filters --}}
        <aside class="w-full md:w-64 shrink-0">
            <div class="sticky top-24">
                <div class="card bg-white shadow-sm border border-slate-100">
                    <div class="card-body p-6">
                        <h3 class="font-bold text-lg mb-4">Danh mục</h3>
                        <ul class="menu p-0 text-base-content">
                            <li><a href="{{ route('shop.index') }}" class="{{ !request('category') ? 'active' : '' }}">Tất
                                    cả sản phẩm</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                        class="{{ request('category') == $category->slug ? 'active' : '' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Product Grid --}}
        <div class="flex-1">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">
                    @if(request('category'))
                        {{ $categories->where('slug', request('category'))->first()->name ?? 'Sản phẩm' }}
                    @else
                        Tất cả sản phẩm
                    @endif
                </h1>
                <span class="text-slate-500 font-medium">{{ $products->total() }} kết quả</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    <div
                        class="card bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
                        <figure class="relative aspect-square overflow-hidden bg-slate-100">
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" 
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </a>
                            @if(!$product->stock)
                                <div class="absolute inset-0 bg-white/60 flex items-center justify-center">
                                    <span class="badge badge-error font-bold p-3">Hết hàng</span>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body p-5">
                            <div class="text-xs font-bold text-slate-400 mb-2 uppercase">{{ $product->category->name }}</div>
                            <h2 class="card-title text-lg mb-2">
                                <a href="{{ route('shop.show', $product->slug) }}" class="hover:text-primary transition-colors">
                                    {{ $product->name }}
                                </a>
                            </h2>
                            <div class="flex items-center justify-between mt-auto">
                                <span
                                    class="text-xl font-bold text-primary">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="ajax-cart-form">
                                        @csrf
                                        <button type="submit" class="btn btn-circle btn-primary btn-sm shadow-lg shadow-primary/30">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="text-slate-300 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-600">Không tìm thấy sản phẩm nào</h3>
                        <p class="text-slate-500">Thử chọn danh mục khác xem sao nhé.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection