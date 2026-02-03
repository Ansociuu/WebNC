<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            Thông tin cá nhân
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            Cập nhật thông tin hồ sơ và địa chỉ email của tài khoản.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold text-slate-700">Họ và tên</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                    class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold text-slate-700">Địa chỉ Email</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </span>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                    class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <p class="text-sm text-amber-800 font-medium">
                        Địa chỉ email của bạn chưa được xác minh.
                        <button form="send-verification" class="underline text-indigo-600 hover:text-indigo-700 font-bold ml-1">
                            Nhấn vào đây để gửi lại email xác nhận.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-sm text-green-600">
                            Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn btn-primary px-8 h-12 rounded-xl bg-indigo-600 hover:bg-slate-900 border-none text-white font-bold shadow-lg shadow-indigo-100">
                Lưu thay đổi
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    Đã lưu thành công.
                </p>
            @endif
        </div>
    </form>
</section>
