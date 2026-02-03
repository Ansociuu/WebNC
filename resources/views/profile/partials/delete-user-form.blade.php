<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-black text-rose-600 tracking-tight">
            Xóa tài khoản
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            Một khi tài khoản của bạn bị xóa, tất cả các tài nguyên và dữ liệu của tài khoản đó sẽ bị xóa vĩnh viễn. Trước khi xóa tài khoản, vui lòng tải xuống bất kỳ dữ liệu hoặc thông tin nào bạn muốn giữ lại.
        </p>
    </header>

    <button
        class="btn btn-error btn-outline h-12 px-8 rounded-xl font-bold border-2 hover:bg-rose-600 hover:border-rose-600 transition-all"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        Xóa tài khoản của tôi
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-10 bg-white rounded-[2.5rem]">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                Bạn có chắc chắn muốn xóa tài khoản không?
            </h2>

            <p class="mt-4 text-sm text-slate-500 font-medium leading-relaxed">
                Sau khi tài khoản bị xóa, toàn bộ dữ liệu sẽ không thể khôi phục. Vui lòng nhập mật khẩu của bạn để xác nhận hành động này.
            </p>

            <div class="mt-8">
                <label for="password" class="sr-only">Mật khẩu</label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all font-medium h-14"
                        placeholder="Nhập mật khẩu để xác nhận"
                    />
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex justify-end gap-4">
                <button type="button" class="btn btn-ghost h-12 px-8 rounded-xl font-bold" x-on:click="$dispatch('close')">
                    Hủy bỏ
                </button>

                <button type="submit" class="btn bg-rose-600 hover:bg-rose-700 text-white h-12 px-8 rounded-xl font-bold border-none shadow-lg shadow-rose-100">
                    Xác nhận xóa vĩnh viễn
                </button>
            </div>
        </form>
    </x-modal>
</section>
