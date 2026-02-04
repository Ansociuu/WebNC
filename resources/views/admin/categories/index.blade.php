@extends('layouts.myapp')

@section('title', 'Quản lý Danh mục')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Danh mục</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tạo danh mục</a>
    </div>

    @if(session('success'))<div class="p-4 bg-green-50 text-green-700 rounded mb-4">{{ session('success') }}</div>@endif

    <div class="bg-white rounded-[1rem] shadow-sm border border-slate-100 overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-50">
                    <th class="text-slate-500 font-bold">Tên</th>
                    <th class="text-slate-500 font-bold">Slug</th>
                    <th class="text-slate-500 font-bold">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="hover:bg-slate-50">
                    <td class="font-bold">{{ $category->name }}</td>
                    <td class="text-slate-500">{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-ghost">Sửa</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-ghost text-red-600">Xoá</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $categories->links() }}</div>
</div>
@endsection
