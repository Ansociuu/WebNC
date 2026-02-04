@extends('layouts.admin')

@section('title', 'Quản trị - Thành viên')

@section('admin_content')
    <div class="mb-8">
        <h1 class="text-4xl font-black text-slate-900 tracking-tight">Quản lý thành viên</h1>
        <p class="text-slate-500 font-medium">Quản lý quyền hạn và thông tin người dùng trong hệ thống.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-lg rounded-2xl bg-emerald-500 text-white border-none mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-error shadow-lg rounded-2xl bg-rose-500 text-white border-none mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Thành viên</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6">Email</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-center">Vai trò</th>
                        <th class="bg-transparent text-slate-500 font-bold uppercase text-xs p-6 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center font-black text-slate-400">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div class="font-black text-slate-900 text-lg">{{ $user->name }}</div>
                            </div>
                        </td>
                        <td class="p-6">
                            <div class="text-slate-500 font-medium">{{ $user->email }}</div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="badge {{ $user->role === 'admin' ? 'bg-indigo-600 text-white border-none' : 'bg-slate-100 text-slate-600 border-none' }} rounded-lg font-bold px-4 py-3">{{ $user->role }}</span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('admin.users.update', $user) }}" method="POST" onsubmit="return confirm('Thay đổi vai trò người dùng?')">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{ $user->role === 'admin' ? 'user' : 'admin' }}">
                                    @if(auth()->id() !== $user->id)
                                        <button class="btn btn-ghost rounded-xl hover:bg-indigo-50 hover:text-indigo-600 font-bold px-4 {{ $user->role === 'admin' ? 'text-orange-600' : 'text-indigo-600' }}">
                                            {{ $user->role === 'admin' ? 'Hạ quyền' : 'Nâng quyền' }}
                                        </button>
                                    @else
                                        <button class="btn btn-ghost btn-disabled rounded-xl font-bold px-4" disabled>Chính bạn</button>
                                    @endif
                                </form>

                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá người dùng này?')">
                                    @csrf
                                    @method('DELETE')
                                    @if(auth()->id() !== $user->id)
                                        <button class="btn btn-ghost btn-square rounded-xl hover:bg-rose-50 hover:text-rose-600 transition-all text-slate-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-6 bg-slate-50 border-t border-slate-100">
            {{ $users->links() }}
        </div>
    </div>
@endsection
