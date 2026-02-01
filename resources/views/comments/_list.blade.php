@if($comments->count())
    <div class="space-y-6">
        @foreach($comments as $comment)
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm transition-all hover:border-primary/20">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div class="bg-slate-100 text-slate-500 rounded-full w-10">
                                <span
                                    class="text-xs font-bold uppercase">{{ substr($comment->author?->name ?? 'K', 0, 1) }}</span>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-800 leading-tight">
                                {{ $comment->author?->name ?? 'Người dùng TechStore' }}</h5>
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-widest mt-0.5">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    @if($comment->title)
                        <div class="badge badge-outline badge-sm text-slate-400 font-medium px-3 italic">{{ $comment->title }}</div>
                    @endif
                </div>

                <div class="text-slate-600 leading-relaxed pl-1">
                    {!! nl2br(e($comment->content)) !!}
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-12 bg-slate-50/50 rounded-3xl border border-dashed border-slate-200">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-message-square-dashed">
                <path d="M3 3v18h18" />
                <path d="M7 8h10" />
                <path d="M7 12h10" />
                <path d="M7 16h10" />
            </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-800 mb-2">Chưa có thảo luận nào</h3>
        <p class="text-slate-500 text-sm">Hãy là người đầu tiên chia sẻ cảm nghĩ về bài viết này!</p>
    </div>
@endif