@extends('layouts.admin')

@section('title', 'Sửa danh mục')

@section('admin_content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Sửa danh mục</h1>
        <a href="{{ route('admin.categories.index') }}" class="text-indigo-600 font-bold">Quay về danh sách</a>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium">Tên</label>
            <input type="text" name="name" class="mt-1 input w-full" value="{{ old('name', $category->name) }}" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Slug (tuỳ chọn)</label>
            <input type="text" name="slug" class="mt-1 input w-full" value="{{ old('slug', $category->slug) }}">
        </div>
        <div class="flex justify-end">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
