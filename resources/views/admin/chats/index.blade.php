@extends('layouts.myapp')

@section('title', 'Quản lý Chat - TechStore')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Quản lý Tin nhắn Chat</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 font-bold">Quay về Dashboard</a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 text-green-700 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-[1rem] shadow-sm border border-slate-100 overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-50">
                    <th class="text-slate-500 font-bold">Khách Hàng</th>
                    <th class="text-slate-500 font-bold">Email</th>
                    <th class="text-slate-500 font-bold">Tin Nhắn Cuối</th>
                    <th class="text-slate-500 font-bold">Ngày</th>
                    <th class="text-slate-500 font-bold">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($conversations as $conv)
                <tr class="hover:bg-slate-50">
                    <td class="font-bold">{{ $conv->name }}</td>
                    <td class="text-slate-500">{{ $conv->email }}</td>
                    <td class="text-slate-600 text-sm truncate max-w-xs">
                        {{ \App\Models\Chat::where('conversation_id', $conv->conversation_id)->where('sender_type', 'user')->latest()->first()->message ?? 'N/A' }}
                    </td>
                    <td class="text-slate-500 text-sm">{{ \Carbon\Carbon::parse($conv->last_message_time)->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.chats.show', $conv->conversation_id) }}" class="btn btn-ghost btn-sm">Trả lời</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-slate-500">Chưa có cuộc trò chuyện nào</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $conversations->links() }}
    </div>
</div>
@endsection
