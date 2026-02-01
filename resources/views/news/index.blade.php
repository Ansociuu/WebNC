@extends('layouts.myapp')

@section('title', 'Tin tức Công nghệ - TechStore')

@section('content')
    <div class="flex flex-col gap-12">
        {{-- Hero Section for News --}}
        <section class="relative rounded-3xl overflow-hidden bg-slate-900 py-20 px-8 text-center">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0 bg-gradient-to-br from-primary to-blue-600 mix-blend-multiply"></div>
                <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=2070&auto=format&fit=crop"
                    alt="News background" class="w-full h-full object-cover">
            </div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">Khám phá Thế giới <span
                        class="text-primary italic">Công nghệ</span></h1>
                <p class="text-slate-300 text-lg mb-8">Cập nhật những xu hướng, đánh giá sản phẩm và tin tức mới nhất từ vũ
                    trụ TechStore.</p>
                @auth
                    <a href="{{ route('news.create') }}" class="btn btn-primary rounded-full px-8 shadow-xl shadow-primary/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-plus-circle">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12h8" />
                            <path d="M12 8v8" />
                        </svg>
                        Tạo bài viết mới
                    </a>
                @endauth
            </div>
        </section>

        {{-- News Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $item)
                <article
                    class="group bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-video relative overflow-hidden bg-slate-100">
                        <img src="https://picsum.photos/seed/{{ $item->id }}/800/450" alt="{{ $item->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="badge badge-primary font-bold py-3 px-4 rounded-full border-none shadow-lg">Tin
                                mới</span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-3 uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-calendar">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                <path d="M16 2v4" />
                                <path d="M8 2v4" />
                                <path d="M3 10h18" />
                            </svg>
                            {{ $item->created_at ? $item->created_at->format('d/m/Y') : 'Vừa xong' }}
                        </div>

                        <h2
                            class="text-xl font-bold text-slate-800 mb-3 line-clamp-2 group-hover:text-primary transition-colors italic">
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                        </h2>

                        <p class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($item->content), 120) }}
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                            <a href="{{ route('news.show', $item->id) }}"
                                class="btn btn-ghost btn-sm text-primary font-bold italic hover:bg-primary/5 px-0">
                                Đọc tiếp
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-arrow-right">
                                    <path d="M5 12h14" />
                                    <path d="m12 5 7 7-7 7" />
                                </svg>
                            </a>

                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <div class="flex gap-1">
                                    <a href="{{ route('news.edit', $item->id) }}"
                                        class="btn btn-ghost btn-xs btn-circle text-slate-400 hover:text-blue-600 hover:bg-blue-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-pencil">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                            <path d="m15 5 4 4" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-ghost btn-xs btn-circle text-slate-400 hover:text-error hover:bg-error/10"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center mt-12 mb-20">
            <div class="join shadow-sm bg-white p-1 rounded-2xl border border-slate-100">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection