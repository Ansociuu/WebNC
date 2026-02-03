@extends('layouts.myapp')

@section('title', 'Thêm sản phẩm mới - TechStore')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.products.index') }}" class="text-indigo-600 font-bold flex items-center gap-2 hover:underline mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            Quay lại danh sách
        </a>
        <h1 class="text-4xl font-black text-slate-900 tracking-tight">Thêm sản phẩm mới</h1>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-50 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Name --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Tên sản phẩm</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm..." class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                    @error('name') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Category --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Danh mục</span></label>
                    <select name="category_id" class="select select-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                        <option value="" disabled selected>Chọn danh mục</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Price --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Giá sản phẩm (₫)</span></label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="0" class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                    @error('price') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Stock --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Số lượng trong kho</span></label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}" placeholder="0" class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                    @error('stock') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Description --}}
            <div class="form-control w-full">
                <label class="label"><span class="label-text font-bold text-slate-700">Mô tả chi tiết</span></label>
                <textarea name="description" rows="5" placeholder="Nhập mô tả sản phẩm..." class="textarea textarea-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 font-medium text-base p-6">{{ old('description') }}</textarea>
                @error('description') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Image Upload --}}
            <div class="form-control w-full">
                <label class="label"><span class="label-text font-bold text-slate-700">Hình ảnh sản phẩm</span></label>
                <div class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-[2rem] p-10 bg-slate-50/50 hover:bg-slate-50 transition-colors cursor-pointer group relative">
                    <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                    <div id="image-preview-container" class="space-y-4 text-center">
                        <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl flex items-center justify-center mx-auto transition-transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload-cloud"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m16 16-4-4-4 4"/></svg>
                        </div>
                        <div>
                            <p class="text-slate-900 font-black">Click để tải ảnh lên</p>
                            <p class="text-slate-400 text-sm font-medium">JPG, PNG, GIF (Max 2MB)</p>
                        </div>
                    </div>
                    <img id="image-preview" src="" class="hidden w-40 h-40 object-cover rounded-2xl shadow-xl border-4 border-white">
                </div>
                @error('image') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <button type="reset" class="btn btn-ghost h-14 px-8 rounded-2xl font-bold">Hủy bỏ</button>
            <button type="submit" class="btn btn-primary h-14 px-12 rounded-2xl font-black bg-indigo-600 border-none shadow-xl shadow-indigo-100">Lưu sản phẩm</button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const container = document.getElementById('image-preview-container');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                container.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
