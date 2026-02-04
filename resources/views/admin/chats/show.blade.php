@extends('layouts.myapp')

@section('title', 'Chi tiết cuộc trò chuyện - TechStore')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Cuộc trò chuyện của {{ $conversation->name }}</h1>
            <p class="text-slate-500">{{ $conversation->email }}</p>
        </div>
        <a href="{{ route('admin.chats.index') }}" class="text-indigo-600 font-bold">Quay về danh sách</a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 text-green-700 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Chat Messages -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-100 p-6 mb-6 max-h-96 overflow-y-auto space-y-4">
        @foreach($messages as $msg)
            <div class="flex gap-3 {{ $msg->sender_type === 'admin' ? 'justify-end' : '' }}">
                <div class="flex gap-3 {{ $msg->sender_type === 'admin' ? 'flex-row-reverse' : '' }}">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-sm font-bold text-white {{ $msg->sender_type === 'user' ? 'bg-blue-600' : ($msg->sender_type === 'admin' ? 'bg-indigo-600' : 'bg-gray-400') }}">
                        {{ substr($msg->name, 0, 1) }}
                    </div>
                    <div class="max-w-xs">
                        <p class="text-xs font-bold text-slate-600 mb-1">{{ $msg->name }} {{ $msg->is_automated ? '(Tự động)' : '' }}</p>
                        <div class="p-3 rounded-lg {{ $msg->sender_type === 'user' ? 'bg-blue-50 text-blue-900' : ($msg->sender_type === 'admin' ? 'bg-indigo-50 text-indigo-900' : 'bg-gray-50 text-gray-900') }}">
                            {{ $msg->message }}
                        </div>
                        <p class="text-xs text-slate-500 mt-1">{{ $msg->created_at->format('H:i, d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Reply Form -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-100 p-6">
        <h3 class="font-bold text-lg mb-4">Trả lời khách hàng</h3>
        <form action="{{ route('admin.chats.reply', $conversationId) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <textarea name="message" rows="4" class="textarea textarea-bordered w-full" placeholder="Nhập tin nhắn trả lời..." required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Gửi Trả Lời</button>
            </div>
        </form>
    </div>
</div>
@endsection
