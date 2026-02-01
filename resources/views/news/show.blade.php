@extends('layouts.myapp')

@section('title', $news->title . ' - TechStore News')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- Breadcrumbs --}}
        <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
            <ul>
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('news.index') }}">Tin tức</a></li>
                <li class="text-slate-600">Chi tiết bài viết</li>
            </ul>
        </div>

        <article class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mb-12">
            <div class="aspect-[21/9] relative overflow-hidden bg-slate-900">
                <img src="https://picsum.photos/seed/{{ $news->id }}/1200/600" alt="{{ $news->title }}"
                    class="w-full h-full object-cover opacity-80">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8 text-white">
                    <span class="badge badge-primary mb-4 font-bold border-none shadow-lg shadow-primary/20 p-3">Công
                        nghệ</span>
                    <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4 italic">{{ $news->title }}</h1>
                    <div class="flex items-center gap-6 text-sm font-medium text-slate-300">
                        <div class="flex items-center gap-2">
                            <div class="avatar placeholder">
                                <div class="bg-primary text-white rounded-full w-8">
                                    <span class="text-xs uppercase">E</span>
                                </div>
                            </div>
                            <span>Ban biên tập TechStore</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-calendar">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                <path d="M16 2v4" />
                                <path d="M8 2v4" />
                                <path d="M3 10h18" />
                            </svg>
                            {{ $news->created_at ? $news->created_at->format('d/m/Y') : 'Vừa xong' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-lg">
                    {!! nl2br(e($news->content)) !!}
                </div>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="mt-12 pt-8 border-t border-slate-100 flex gap-4">
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-outline btn-sm rounded-xl">Chỉnh sửa bài
                            viết</a>
                    </div>
                @endif
            </div>
        </article>

        {{-- Comments Section --}}
        <section id="comments" class="mb-20">
            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Bình luận</h2>
                <span class="badge badge-neutral font-bold rounded-lg">{{ $comments->count() }}</span>
            </div>

            {{-- Flash message --}}
            @if(session('success'))
                <div class="alert alert-success shadow-lg mb-8 rounded-2xl border-none text-white bg-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 mb-8">
                @auth
                    <div class="flex gap-4 mb-6 items-start">
                        <div class="avatar placeholder shrink-0">
                            <div class="bg-slate-200 text-slate-500 rounded-full w-10">
                                <span class="text-xs uppercase font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-slate-800 mb-1">Viết bình luận của bạn</h4>
                            <p class="text-xs text-slate-400">Đang đăng nhập với tư cách {{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    @include('comments._form', ['news' => $news])
                @else
                    <div class="text-center py-6 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <p class="text-slate-500 mb-4">Bạn chưa đăng nhập. Hãy đăng nhập để chia sẻ ý kiến của mình nhé!</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm rounded-full px-8">Đăng nhập ngay</a>
                    </div>
                @endauth
            </div>

            {{-- Comments list --}}
            <div class="space-y-6">
                @include('comments._list', ['comments' => $comments])
            </div>

            {{-- Pagination links --}}
            <div class="flex justify-center mt-12">
                {{ $comments->links() }}
            </div>
        </section>
    </div>
@endsection