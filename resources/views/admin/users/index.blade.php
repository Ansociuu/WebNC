@extends('layouts.myapp')

@section('title', 'Quản trị - Thành viên')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Quản lý thành viên</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 font-bold">Quay về Dashboard</a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 text-green-700 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="p-4 bg-red-50 text-red-700 rounded mb-4">{{ session('error') }}</div>
    @endif

    <div class="bg-white rounded-[1rem] shadow-sm border border-slate-100 overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-50">
                    <th class="text-slate-500 font-bold">Tên</th>
                    <th class="text-slate-500 font-bold">Email</th>
                    <th class="text-slate-500 font-bold">Vai trò</th>
                    <th class="text-slate-500 font-bold">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-slate-50">
                    <td class="font-bold">{{ $user->name }}</td>
                    <td class="text-slate-500">{{ $user->email }}</td>
                    <td><span class="badge {{ $user->role === 'admin' ? 'badge-primary' : 'badge-ghost' }}">{{ $user->role }}</span></td>
                    <td class="flex gap-2 items-center">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST" onsubmit="return confirm('Thay đổi vai trò người dùng?')">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="role" value="{{ $user->role === 'admin' ? 'user' : 'admin' }}">
                            @if(auth()->id() !== $user->id)
                                <button class="btn btn-ghost btn-sm">{{ $user->role === 'admin' ? 'Hạ quyền' : 'Nâng quyền' }}</button>
                            @else
                                <button class="btn btn-disabled btn-sm" disabled>Không thể thay đổi</button>
                            @endif
                        </form>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá người dùng này?')">
                            @csrf
                            @method('DELETE')
                            @if(auth()->id() !== $user->id)
                                <button class="btn btn-ghost btn-sm text-red-600">Xoá</button>
                            @else
                                <button class="btn btn-disabled btn-sm text-red-600" disabled>Không thể xoá</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

@endsection
