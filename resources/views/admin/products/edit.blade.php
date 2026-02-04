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

            {{-- Current Image & Upload --}}
            <div class="form-control w-full">
                <label class="label"><span class="label-text font-bold text-slate-700">Hình ảnh sản phẩm</span></label>
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-40 h-40 bg-slate-50 rounded-2xl overflow-hidden border-4 border-white shadow-xl relative group">
                        <img id="image-preview" src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1517336712461-481bf488d78a?w=400&h=400&fit=crop' }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-white text-xs font-bold">Ảnh hiện tại</span>
                        </div>
                    </div>
                    
                    <div class="flex-1 w-full">
                        <div class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-[1.5rem] p-8 bg-slate-50/50 hover:bg-slate-50 transition-colors cursor-pointer relative">
                            <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-plus mx-auto text-indigo-500 mb-2"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6.5"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                <p class="text-slate-900 font-bold text-sm">Thay đổi hình ảnh</p>
                                <p class="text-slate-400 text-[10px] font-medium uppercase mt-1">Sẽ tự động cập nhật bản xem trước</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-ghost h-14 px-8 rounded-2xl font-bold">Hủy bỏ</a>
            <button type="submit" class="btn btn-primary h-14 px-12 rounded-2xl font-black bg-indigo-600 border-none shadow-xl shadow-indigo-100">Cập nhật sản phẩm</button>
        </div>
    </form>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
