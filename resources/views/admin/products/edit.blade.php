@extends('layouts.admin')

@section('title', 'Chỉnh sửa sản phẩm - TechStore')

@section('admin_content')
    <div class="mb-8">
        <a href="{{ route('admin.products.index') }}" class="text-indigo-600 font-bold flex items-center gap-2 hover:underline mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            Quay lại danh sách
        </a>
        <h1 class="text-4xl font-black text-slate-900 tracking-tight">Chỉnh sửa sản phẩm</h1>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-50 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Name --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Tên sản phẩm</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                    @error('name') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Category --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Danh mục</span></label>
                    <select name="category_id" class="select select-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Price --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Giá sản phẩm (₫)</span></label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                </div>

                {{-- Stock --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Số lượng trong kho</span></label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium" required>
                </div>
            </div>

            {{-- Description --}}
            <div class="form-control w-full">
                <label class="label"><span class="label-text font-bold text-slate-700">Mô tả chi tiết</span></label>
                <textarea name="description" rows="5" class="textarea textarea-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 font-medium text-base p-6">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Image Selection (Upload or URL) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Image Upload --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Tải ảnh mới</span></label>
                    <div class="flex flex-col md:flex-row gap-6 items-center border-2 border-dashed border-slate-200 rounded-[2rem] p-6 bg-slate-50/50 hover:bg-slate-50 transition-colors cursor-pointer relative min-h-[12rem]">
                        <input type="file" name="image" id="image-upload" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                        
                        {{-- Current/New Preview --}}
                        <div class="w-24 h-24 bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-white flex-shrink-0">
                            <img id="upload-preview" src="{{ !str_starts_with($product->image, 'http') ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        
                        <div class="text-center md:text-left">
                            <p class="text-slate-900 font-bold">Tải lên file mới</p>
                            <p class="text-slate-400 text-[10px] font-medium uppercase mt-1">Sẽ ghi đè URL nếu cả hai cùng có</p>
                        </div>
                    </div>
                </div>

                {{-- Image URL --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Hoặc sử dụng URL ảnh</span></label>
                    <div class="flex flex-col md:flex-row gap-6 items-center border-2 border-slate-200 rounded-[2rem] p-6 bg-slate-50 hover:border-indigo-200 transition-colors relative min-h-[12rem]">
                        {{-- URL Preview --}}
                        <div class="w-24 h-24 bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-white flex-shrink-0 flex items-center justify-center">
                            <img id="url-preview" src="{{ str_starts_with($product->image, 'http') ? $product->image : '' }}" 
                                 class="{{ str_starts_with($product->image, 'http') ? '' : 'hidden' }} w-full h-full object-cover">
                            <div id="url-placeholder" class="{{ str_starts_with($product->image, 'http') ? 'hidden' : '' }} text-slate-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link-2"><path d="M9 17H7A5 5 0 0 1 7 7h2"/><path d="M15 7h2a5 5 0 0 1 0 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                            </div>
                        </div>

                        <div class="flex-1 w-full space-y-3">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 w-4 h-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                </span>
                                <input type="url" name="image_url" id="image-url" value="{{ old('image_url', str_starts_with($product->image, 'http') ? $product->image : '') }}" 
                                       placeholder="https://example.com/image.jpg" 
                                       class="input input-bordered w-full rounded-xl bg-white border-slate-100 focus:border-indigo-500 h-11 text-sm font-medium pl-10"
                                       oninput="previewUrl(this.value)">
                            </div>
                            <p class="text-slate-400 text-[10px] font-medium uppercase">Nhập URL để gán ảnh từ bên ngoài</p>
                        </div>
                    </div>
                </div>
            </div>
            @error('image') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            @error('image_url') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-ghost h-14 px-8 rounded-2xl font-bold">Hủy bỏ</a>
            <button type="submit" class="btn btn-primary h-14 px-12 rounded-2xl font-black bg-indigo-600 border-none shadow-xl shadow-indigo-100">Cập nhật sản phẩm</button>
        </div>
    </form>

<script>
    function previewImage(input) {
        const preview = document.getElementById('upload-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewUrl(url) {
        const preview = document.getElementById('url-preview');
        const placeholder = document.getElementById('url-placeholder');
        
        if (url) {
            preview.src = url;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            
            preview.onerror = function() {
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            };
        } else {
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }
</script>
@endsection
