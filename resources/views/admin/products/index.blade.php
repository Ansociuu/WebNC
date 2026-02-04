@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm - TechStore')

@section('admin_content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight mb-2">Danh sách sản phẩm</h1>
            <p class="text-slate-500 font-medium">Quản lý kho hàng và thông tin sản phẩm của TechStore.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-[1.5rem] px-8 h-14 font-black shadow-lg shadow-primary/25 border-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Thêm sản phẩm
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success shadow-lg rounded-2xl bg-emerald-500 text-white border-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Sản phẩm</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Danh mục</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Giá</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Kho</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($products as $product)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 flex-shrink-0">
                                    <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" 
                                         alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-black text-slate-900 text-lg">{{ $product->name }}</div>
                                    <div class="text-slate-400 text-sm font-medium">#{{ $product->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="badge badge-ghost rounded-lg font-bold px-4 py-3 bg-slate-100 text-slate-600 border-none">{{ $product->category->name }}</span>
                        </td>
                        <td class="p-6 text-center">
                            <div class="font-black text-indigo-600 text-lg">{{ number_format($product->price, 0, ',', '.') }}₫</div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="font-bold {{ $product->stock < 10 ? 'text-rose-500' : 'text-slate-700' }}">{{ $product->stock }}</span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-ghost btn-square rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-ghost btn-square rounded-xl hover:bg-rose-50 hover:text-rose-600 transition-all text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-6 bg-slate-50 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>
@endsection
