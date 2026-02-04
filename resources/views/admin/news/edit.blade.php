@extends('layouts.admin')

@section('title', 'Sửa tin tức')

@section('admin_content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Sửa tin tức</h1>
        <a href="{{ route('admin.news.index') }}" class="text-indigo-600 font-bold">Quay về danh sách</a>
    </div>

    <form action="{{ route('admin.news.update', $news) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium">Tiêu đề</label>
            <input type="text" name="title" class="mt-1 input w-full" value="{{ old('title', $news->title) }}" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Nội dung</label>
            <textarea name="content" rows="6" class="mt-1 textarea w-full" required>{{ old('content', $news->content) }}</textarea>
        </div>
        <div class="flex justify-end">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
