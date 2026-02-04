@extends('layouts.admin')

@section('title', 'Quản lý Danh mục')

@section('admin_content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Danh mục sản phẩm</h1>
            <p class="text-slate-500 font-medium">Phân loại sản phẩm để khách hàng dễ dàng tìm kiếm.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary rounded-[1.5rem] px-8 h-14 font-black shadow-lg shadow-primary/25 border-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tạo danh mục
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-lg rounded-2xl bg-emerald-500 text-white border-none mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Tên danh mục</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Slug</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($categories as $category)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-6">
                            <div class="font-black text-slate-900 text-lg">{{ $category->name }}</div>
                        </td>
                        <td class="p-6">
                            <code class="bg-slate-100 text-slate-500 px-3 py-1 rounded-lg font-bold text-sm">{{ $category->slug }}</code>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-ghost btn-square rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-all text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-ghost btn-square rounded-xl hover:bg-rose-50 hover:text-rose-600 transition-all text-slate-400">
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection
