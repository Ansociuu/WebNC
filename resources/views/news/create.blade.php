@extends('layouts.myapp')

@section('title', 'Tạo bài viết mới - TechStore')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Breadcrumbs --}}
    <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('news.index') }}">Tin tức</a></li>
            <li class="text-slate-600">Tạo bài viết</li>
        </ul>
    </div>

    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-slate-100 mb-20">
        <div class="flex items-center gap-4 mb-10">
            <div class="bg-primary/10 text-primary p-3 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2"><path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Tạo bài viết mới</h1>
                <p class="text-slate-400 text-sm">Chia sẻ những cập nhật công nghệ mới nhất đến cộng đồng.</p>
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

        <form action="{{ route('news.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="form-control w-full">
                <label for="title" class="label">
                    <span class="label-text font-bold text-slate-700">Tiêu đề bài viết <span class="text-error">*</span></span>
                </label>
                <div class="relative">
                    <input type="text" name="title" id="title" placeholder="VD: Đánh giá iPhone 15 Pro sau 3 tháng sử dụng..." 
                        class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-200 focus:border-primary transition-all pr-12 h-14" 
                        value="{{ old('title') }}" required autofocus>
                </div>
                <label class="label">
                    <span class="label-text-alt text-slate-400">Tiêu đề nên ngắn gọn và thu hút người đọc.</span>
                </label>
            </div>

            <div class="form-control w-full">
                <label for="content" class="label">
                    <span class="label-text font-bold text-slate-700">Nội dung bài viết <span class="text-error">*</span></span>
                </label>
                <textarea name="content" id="content" rows="12" 
                    placeholder="Viết nội dung bài viết của bạn tại đây..." 
                    class="textarea textarea-bordered w-full rounded-2xl bg-slate-50 border-slate-200 focus:border-primary transition-all leading-relaxed p-6" 
                    required>{{ old('content') }}</textarea>
                <label class="label">
                    <span class="label-text-alt text-slate-400 font-medium italic">Gợi ý: Bạn có thể sử dụng các thẻ HTML cơ bản để làm đẹp nội dung.</span>
                </label>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-slate-50">
                <button type="submit" class="btn btn-primary rounded-xl px-12 shadow-lg shadow-primary/20 flex-grow sm:flex-grow-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle-2"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    Xuất bản bài viết
                </button>
                <a href="{{ route('news.index') }}" class="btn btn-ghost rounded-xl px-8 text-slate-500 hover:bg-slate-50">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</div>
@endsection