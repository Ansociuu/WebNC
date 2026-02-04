@extends('layouts.admin')

@section('title', 'Thêm sản phẩm mới - TechStore')

@section('admin_content')
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

            {{-- Image Selection (Upload or URL) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Image Upload --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Tải ảnh lên</span></label>
                    <div class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-[2rem] p-10 bg-slate-50/50 hover:bg-slate-50 transition-colors cursor-pointer group relative h-64">
                        <input type="file" name="image" id="image-upload" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                        <div id="upload-instruction" class="space-y-4 text-center">
                            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto transition-transform group-hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload-cloud"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m16 16-4-4-4 4"/></svg>
                            </div>
                            <div>
                                <p class="text-slate-900 font-bold">Chọn file ảnh</p>
                                <p class="text-slate-400 text-xs font-medium uppercase mt-1">JPG, PNG, GIF (Max 10MB)</p>
                            </div>
                        </div>
                        <img id="upload-preview" src="" class="hidden w-full h-full object-cover rounded-2xl shadow-inner">
                    </div>
                </div>

                {{-- Image URL --}}
                <div class="form-control w-full">
                    <label class="label"><span class="label-text font-bold text-slate-700">Hoặc sử dụng URL ảnh</span></label>
                    <div class="space-y-4 h-64">
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link-2"><path d="M9 17H7A5 5 0 0 1 7 7h2"/><path d="M15 7h2a5 5 0 0 1 0 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                            </span>
                            <input type="url" name="image_url" id="image-url" value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg" 
                                   class="input input-bordered w-full rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 h-14 font-medium pl-12"
                                   oninput="previewUrl(this.value)">
                        </div>
                        <div class="h-[calc(100%-4.5rem)] rounded-[1.5rem] bg-slate-100 border-2 border-slate-200 border-dashed flex items-center justify-center overflow-hidden group">
                            <img id="url-preview" src="" class="hidden w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div id="url-placeholder" class="text-slate-400 text-center p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image mx-auto mb-2 opacity-20"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                <p class="text-[10px] font-black uppercase tracking-widest">Xem trước URL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @error('image') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            @error('image_url') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>
        </div>

        <div class="flex justify-end gap-4">
            <button type="reset" class="btn btn-ghost h-14 px-8 rounded-2xl font-bold">Hủy bỏ</button>
            <button type="submit" class="btn btn-primary h-14 px-12 rounded-2xl font-black bg-indigo-600 border-none shadow-xl shadow-indigo-100">Lưu sản phẩm</button>
        </div>
    </form>

<script>
    function previewImage(input) {
        const preview = document.getElementById('upload-preview');
        const instruction = document.getElementById('upload-instruction');
        const urlInput = document.getElementById('image-url');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                instruction.classList.add('hidden');
                // Clear URL input if file is chosen (optional, purely for UX)
                // urlInput.value = '';
                // previewUrl(''); 
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
            
            // Handle error if URL is not an image
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
