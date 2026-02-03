@extends('layouts.myapp')

@section('title', 'Đăng ký thành viên - TechStore')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[2.5rem] shadow-2xl border border-slate-100 relative overflow-hidden">
        {{-- Decorative background --}}
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-indigo-600/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-purple-600/5 rounded-full blur-3xl"></div>

        <div class="text-center relative z-10">
            <h2 class="mt-6 text-4xl font-black text-slate-900 tracking-tight">Tạo tài khoản mới</h2>
            <p class="mt-2 text-sm text-slate-500 font-medium">
                Tham gia cộng đồng công nghệ TechStore ngay hôm nay
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6 relative z-10">
            @csrf

            <div class="space-y-4">
                {{-- Name --}}
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-bold text-slate-700">Họ và tên của bạn</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                            placeholder="Nguyễn Văn A" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email Address --}}
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-bold text-slate-700">Địa chỉ Email</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                            placeholder="techstore@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-bold text-slate-700">Mật khẩu</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-bold text-slate-700">Xác nhận mật khẩu</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1.17 1.17 0 0 1-1.52 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="input input-bordered w-full pl-12 rounded-2xl bg-slate-50 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-medium h-14"
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-full h-14 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-100 hover:shadow-indigo-200 border-none bg-indigo-600 hover:bg-slate-900 transition-all duration-300">
                    Bắt đầu ngay
                </button>
            </div>

            <div class="text-center pt-4">
                <p class="text-sm text-slate-500 font-medium">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-700 transition-colors">Đăng nhập tại đây</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
