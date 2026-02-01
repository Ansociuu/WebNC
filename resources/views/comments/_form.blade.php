@if($errors->any())
    <div class="alert alert-error shadow-sm mb-6 rounded-xl border-none text-white">
        <div class="flex flex-col gap-1">
            @foreach($errors->all() as $error)
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wide">{{ $error }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endif

<form action="{{ route('news.comments.store', $news->id) }}" method="POST" class="space-y-4">
    @csrf
    <div class="form-control w-full">
        <label for="title" class="label">
            <span class="label-text font-bold text-slate-700">Tiêu đề <span class="text-slate-400 font-normal">(Tùy
                    chọn)</span></span>
        </label>
        <input type="text" name="title" id="title" placeholder="Nhập tiêu đề bình luận của bạn..."
            class="input input-bordered w-full rounded-xl bg-slate-50 border-slate-200 focus:border-primary transition-all"
            value="{{ old('title') }}">
    </div>

    <div class="form-control w-full">
        <label for="content" class="label">
            <span class="label-text font-bold text-slate-700">Nội dung <span class="text-error">*</span></span>
        </label>
        <textarea name="content" id="content" rows="4" placeholder="Bạn nghĩ gì về bài viết này?"
            class="textarea textarea-bordered w-full rounded-xl bg-slate-50 border-slate-200 focus:border-primary transition-all leading-relaxed">{{ old('content') }}</textarea>
    </div>

    <div class="flex justify-end pt-2">
        <button type="submit" class="btn btn-primary rounded-full px-10 shadow-lg shadow-primary/20">
            Gửi bình luận
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-send">
                <path d="m22 2-7 20-4-9-9-4Z" />
                <path d="M22 2 11 13" />
            </svg>
        </button>
    </div>
</form>