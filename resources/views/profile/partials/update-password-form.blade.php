<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            Cập nhật mật khẩu
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            Hãy đảm bảo rằng tài khoản của bạn đang sử dụng một mật khẩu dài và ngẫu nhiên để duy trì tính bảo mật.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold text-slate-700">Mật khẩu hiện tại</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round"><path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4c.9.4 1.8.4 2.6 0l4-4c.4-.4.4-1.1 0-1.5-.1-.1-.1-.1-.2-.2-1.3-1.3-1.3-3.4 0-4.7.1-.1.1-.1.2-.2.4-.4.4-1.1 0-1.5l-4-4c-.4-.4-1.1-.4-1.5 0-.1.1-.1.1-.2.2-1.3 1.3-3.4 1.3-4.7 0-.1-.1-.1-.2-.2-.4-.4-1.1-.4-1.5 0l-4 4c-.4.4-.4 1.1 0 1.5.1.1.1.1.2.2 1.3 1.3 1.3 3.4 0 4.7-.1.1-.1.1-.2.2l-1.4 1.4v2H2z"/><circle cx="17" cy="7" r="1"/></svg>
                </span>
                <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                    class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold text-slate-700">Mật khẩu mới</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </span>
                <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                    class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold text-slate-700">Xác nhận mật khẩu mới</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1.17 1.17 0 0 1-1.52 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                </span>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                    class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn btn-primary px-8 h-12 rounded-xl bg-indigo-600 hover:bg-slate-900 border-none text-white font-bold shadow-lg shadow-indigo-100">
                Đổi mật khẩu
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    Đã cập nhật mật khẩu.
                </p>
            @endif
        </div>
    </form>
</section>
