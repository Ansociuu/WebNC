@extends('layouts.myapp')

@section('title', 'Chỉnh sửa bài viết - TechStore')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Breadcrumbs --}}
    <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('news.index') }}">Tin tức</a></li>
            <li class="text-slate-600">Chỉnh sửa bài viết</li>
        </ul>
    </div>

    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-slate-100 mb-20">
        <div class="flex items-center gap-4 mb-10">
            <div class="bg-blue-50 text-blue-600 p-3 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-edit"><path d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5"/><polyline points="14 2 14 8 20 8"/><path d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l1-3.95 5.42-5.44Z"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Chỉnh sửa bài viết</h1>
                <p class="text-slate-400 text-sm">Cập nhật thông tin chính xác nhất cho cộng đồng TechStore.</p>
            </div>
        </div>

        @if($errors->any())
        <div class="alert alert-error shadow-sm mb-8 rounded-2xl border-none text-white">
            <div class="flex flex-col gap-1 w-full">
                <div class="flex items-center gap-2 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="font-bold">Đã có lỗi xảy ra:</span>
                </div>
                <ul class="list-disc list-inside text-sm pl-2">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="{{ route('news.update', $news->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <div class="form-control w-full">
                <label for="title" class="label">
                    <span class="label-text font-bold text-slate-700">Tiêu đề bài viết <span class="text-error">*</span></span>
                </label>
                <input type="text" name="title" id="title" placeholder="VD: Đánh giá iPhone 15 Pro sau 3 tháng sử dụng..." 
                    class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-200 focus:border-primary transition-all h-14" 
                    value="{{ old('title', $news->title) }}" required>
            </div>

            <div class="form-control w-full">
                <label for="content" class="label">
                    <span class="label-text font-bold text-slate-700">Nội dung bài viết <span class="text-error">*</span></span>
                </label>
                <textarea name="content" id="content" rows="12" 
                    placeholder="Viết nội dung bài viết của bạn tại đây..." 
                    class="textarea textarea-bordered w-full rounded-2xl bg-slate-50 border-slate-200 focus:border-primary transition-all leading-relaxed p-6" 
                    required>{{ old('content', $news->content) }}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-slate-50">
                <button type="submit" class="btn btn-primary rounded-xl px-12 shadow-lg shadow-primary/20 flex-grow sm:flex-grow-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Lưu thay đổi
                </button>
                <a href="{{ route('news.show', $news->id) }}" class="btn btn-ghost rounded-xl px-8 text-slate-500 hover:bg-slate-50">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</div>
@endsection