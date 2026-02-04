@extends('layouts.myapp')

@section('title', 'Quản trị - Tin tức')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Quản lý Tin tức</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Tạo tin mới</a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 text-green-700 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-[1rem] shadow-sm border border-slate-100 overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-50">
                    <th class="text-slate-500 font-bold">Tiêu đề</th>
                    <th class="text-slate-500 font-bold">Ngày</th>
                    <th class="text-slate-500 font-bold">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr class="hover:bg-slate-50">
                    <td class="font-bold">{{ $item->title }}</td>
                    <td class="text-slate-500">{{ $item->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-ghost">Sửa</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-ghost text-red-600">Xoá</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $news->links() }}</div>
</div>
@endsection
